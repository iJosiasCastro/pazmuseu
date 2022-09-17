<?php

use App\Http\Controllers\AuthnController;
use App\Http\Controllers\ExposicionController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\TurnoController;
use App\Mail\Valoracion;
use App\Models\Exposicion;
use App\Models\Guia;
use App\Models\Ruta;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $exposicions = Exposicion::all();
    $rutas = Ruta::all();
    $guias = Guia::all();
    $turnos = Turno::all();

    return view('home',  compact('exposicions', 'rutas', 'guias', 'turnos'));
});


Route::get('/ingresar', function () {
    return view('admin.login');
})->name('login');

Route::middleware('auth:sanctum')->get('/administrar', function () {
    $exposicions = Exposicion::all();
    $rutas = Ruta::all();
    $guias = Guia::all();
    $turnosModel = Turno::all()->load('guia', 'ruta', 'inscripciones');
    $turnos = [];

    foreach ($turnosModel as $turno) {
        $pendientes = false;
        foreach($turno->inscripciones as $inscripcion){
            if(!$inscripcion->confirmada){
                $pendientes = true;
            }
        }
        
        if($pendientes){
            array_push($turnos, ['turno' => $turno, 'pendientes' => true]);
        }else{
            array_push($turnos, ['turno' => $turno, 'pendientes' => false]);
        }
    }
    // return $turnos;
    return view('admin.dashboard', compact('exposicions', 'rutas', 'guias', 'turnos'));
})->name('dashboard');

Route::post('/login', [LoginController::class, 'authenticate']);


// Exposicion
Route::get('/exposiciones', [ExposicionController::class, 'index']);
Route::middleware('auth:sanctum')->get('/exposicion/crear', function(){
    return view('exposicion.create');
})->name('exposicion.create');
Route::middleware('auth:sanctum')->post('/exposicion', [ExposicionController::class, 'store'])->name('exposicion.store');
Route::middleware('auth:sanctum')->get('/exposicion/editar/{exposicion}', [ExposicionController::class, 'edit'])->name('exposicion.edit');
Route::middleware('auth:sanctum')->put('/exposicion/{exposicion}', [ExposicionController::class, 'update'])->name('exposicion.update');
Route::middleware('auth:sanctum')->delete('/exposicion/{exposicion}', [ExposicionController::class, 'destroy'])->name('exposicion.destroy');
Route::get('/exposicion/{exposicion}', [ExposicionController::class, 'show'])->name('exposicion.show');


// Ruta
Route::get('/rutas', [RutaController::class, 'index']);
Route::middleware('auth:sanctum')->get('/ruta/crear', function(){
    $exposicions = Exposicion::all();
    return view('ruta.create', compact('exposicions'));
})->name('ruta.create');
Route::middleware('auth:sanctum')->post('/ruta', [RutaController::class, 'store'])->name('ruta.store');
Route::middleware('auth:sanctum')->get('/ruta/editar/{ruta}', [RutaController::class, 'edit'])->name('ruta.edit');
Route::middleware('auth:sanctum')->put('/ruta/{ruta}', [RutaController::class, 'update'])->name('ruta.update');
Route::middleware('auth:sanctum')->delete('/ruta/{ruta}', [RutaController::class, 'destroy'])->name('ruta.destroy');
Route::get('/ruta/{ruta}', [RutaController::class, 'show'])->name('ruta.show');


// Guia
Route::middleware('auth:sanctum')->get('/guia/crear', function(){
    $guias = Guia::all();
    return view('guia.create', compact('guias'));
})->name('guia.create');
Route::middleware('auth:sanctum')->post('/guia', [GuiaController::class, 'store'])->name('guia.store');
Route::middleware('auth:sanctum')->get('/guia/editar/{guia}', [GuiaController::class, 'edit'])->name('guia.edit');
Route::middleware('auth:sanctum')->put('/guia/{guia}', [GuiaController::class, 'update'])->name('guia.update');
Route::middleware('auth:sanctum')->delete('/guia/{guia}', [GuiaController::class, 'destroy'])->name('guia.destroy');


// Turno
Route::get('/turnos', [TurnoController::class, 'index'])->name('turno.index');
Route::middleware('auth:sanctum')->get('/turno/crear', function(){
    $turnos = Guia::all();
    $rutas = Ruta::pluck('title', 'id');
    $guias = Guia::pluck('name', 'id');
    return view('turno.create', compact('turnos', 'rutas', 'guias'));
})->name('turno.create');
Route::middleware('auth:sanctum')->post('/turno', [TurnoController::class, 'store'])->name('turno.store');
Route::middleware('auth:sanctum')->get('/turno/editar/{turno}', [TurnoController::class, 'edit'])->name('turno.edit');
Route::middleware('auth:sanctum')->put('/turno/{turno}', [TurnoController::class, 'update'])->name('turno.update');
Route::middleware('auth:sanctum')->delete('/turno/{turno}', [TurnoController::class, 'destroy'])->name('turno.destroy');

// Inscripción turno
Route::get('/inscribirse/turno/{turno}', [TurnoController::class, 'inscripcion'])->name('turno.inscripcion');
Route::post('/inscribirse/{turno}', [TurnoController::class, 'inscribirse'])->name('turno.inscribirse');

Route::middleware('auth:sanctum')->get('/inscripciones/{turno}', [TurnoController::class, 'inscripciones'])->name('turno.inscripciones');

Route::middleware('auth:sanctum')->post('/confirmar/{turno}/{inscripcion}', [TurnoController::class, 'confirmar'])->name('turno.inscripcion.confirmar');
Route::middleware('auth:sanctum')->delete('/inscripcion/eliminar/{turno}/{inscripcion}', [TurnoController::class, 'eliminarInscripcion'])->name('turno.inscripcion.eliminar');

Route::post('/valoracion/{exposicion}', function(Request $request, Exposicion $exposicion){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
    ]);
    $email = new Valoracion($request->all());
    Mail::to('josiascastro2003@gmail.com')->send($email);
    return redirect()->route('exposicion.show', $exposicion)->with('info', 'Gracias, tu valoración fue enviada, ¡Estamos en contacto!');
})->name('valoracion');
