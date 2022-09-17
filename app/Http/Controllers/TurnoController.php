<?php

namespace App\Http\Controllers;

use App\Mail\InscripcionTurno;
use App\Models\Guia;
use App\Models\Inscripcion;
use App\Models\Ruta;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TurnoController extends Controller
{
    public function index(){
        $turnos = Turno::all();
        return view('turno.index', compact('turnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "fecha" => "required",
            "hora" => "required",
            "guia_id" => "required",
            "ruta_id" => "required"
        ]);
        
        $turno = Turno::create($request->all());

        return redirect()->route('turno.edit', $turno)->with('info', 'El turno fue creado con éxito');
    }

    public function edit(Turno $turno)
    {
        $rutas = Ruta::pluck('title', 'id');
        $guias = Guia::pluck('name', 'id');
        return view('turno.edit', compact('turno', 'rutas', 'guias'));
    }

    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            "fecha" => "required",
            "hora" => "required",
            "guia_id" => "required",
            "ruta_id" => "required"
        ]);

        $turno->fecha = $request->fecha; 
        $turno->hora = $request->hora; 
        $turno->guia_id = $request->guia_id; 
        $turno->ruta_id = $request->ruta_id; 
        
        $turno->save();

        return redirect()->route('turno.edit', $turno)->with('info', 'El turno fue editado');
    }

    public function destroy(Turno $turno){
        $turno->delete();
        return redirect()->route('dashboard', $turno)->with('info', 'El turno ah sido eliminado');
    }

    public function inscripcion(Turno $turno){
        return view('turno.inscripcion', compact('turno'));
    }

    public function inscribirse(Request $request, Turno $turno){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $request->merge([
            'confirmada' => false
        ]);

        $turno->inscripciones()->create($request->all());
        
        return redirect()->route('turno.index')->with('info', 'Se inscribió al turno, recibirá una confirmación en su casilla de correo');
    }

    public function inscripciones(Turno $turno){
        return view('turno.inscripciones', compact('turno'));
    }

    public function confirmar(Request $request, Turno $turno, Inscripcion $inscripcion){
        $inscripcion->confirmada = true;
        $inscripcion->save();

        $email = new InscripcionTurno(['turno'=>$turno, 'inscripcion'=>$inscripcion, 'ruta'=> $turno->ruta]);
        Mail::to($inscripcion->email)->send($email);

        return redirect()->route('turno.inscripciones', $turno)->with('info', 'Se confirmó el turno');
    }

    public function eliminarInscripcion(Turno $turno, Inscripcion $Inscripcion){
        $Inscripcion->delete();
        return redirect()->route('turno.inscripciones', $turno)->with('info', 'Se eliminó el turno');
    }
}
