<?php

namespace App\Http\Controllers;

use App\Models\Exposicion;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RutaController extends Controller
{
    public function index(){
        $rutas = Ruta::all();
        return view('ruta.index', compact('rutas'));
    }

    public function show(Ruta $ruta){
        $related = Ruta::where('id', '!=', $ruta->id)
                        ->latest('id')
                        ->take(4)
                        ->get();
        return view('ruta.show', compact('ruta', 'related'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "exposicions" => "required",
            "file" => "required"
        ]);

        if($request->file('file')){
            $url = Storage::put('public/exposicion', $request->file('file'));
            $request->merge([
                "image_url" => $url
            ]);
        }

        $ruta = Ruta::create($request->all());

        if($request->exposicions){
            $ruta->exposicions()->attach($request->exposicions);
        }

        return redirect()->route('ruta.edit', $ruta)->with('info', 'La ruta fue creada con éxito');


    }

    public function edit(Ruta $ruta)
    {
        $exposicions = Exposicion::all();
        return view('ruta.edit', compact('ruta', 'exposicions'));
    }

    public function update(Request $request, Ruta $ruta)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "exposicions" => "required",
        ]);

        $ruta->title = $request->title; 
        $ruta->description = $request->description; 
        
        if($request->file('file')){
            $url = Storage::put('public/exposicion', $request->file('file'));
            $ruta->image_url = $url;
        }

        if($request->exposicions){
            $ruta->exposicions()->sync($request->exposicions);
        }

        $ruta->save();

        return redirect()->route('ruta.edit', $ruta)->with('info', 'La ruta fue editada con éxito');

    }

    public function destroy(Ruta $ruta){
        Storage::delete($ruta->image_url);
        $ruta->delete();

        return redirect()->route('dashboard', $ruta)->with('info', 'La exposicion ah sido eliminada');


    }
}
