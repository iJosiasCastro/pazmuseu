<?php

namespace App\Http\Controllers;

use App\Models\Exposicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExposicionController extends Controller
{
    public function index(){
        $exposicions = Exposicion::all();
        return view('exposicion.index', compact('exposicions'));
    }

    public function show(Exposicion $exposicion){

        $related = Exposicion::where('id', '!=', $exposicion->id)
                        ->latest('id')
                        ->take(4)
                        ->get();
        return view('exposicion.show', compact('exposicion', 'related'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "file" => "required"
        ]);
        
        if($request->file('file')){
            $url = Storage::put('public/exposicion', $request->file('file'));
            $request->merge([
                "image_url" => $url
            ]);
        }
        $exposicion = Exposicion::create($request->all());

        return redirect()->route('exposicion.edit', $exposicion)->with('info', 'La exposicion fue creada con éxito');
    }

    public function edit(Exposicion $exposicion)
    {
        return view('exposicion.edit', compact('exposicion'));
    }

    public function update(Request $request, Exposicion $exposicion)
    {
        $request->validate([
            "title" => "required",
            "content" => "required",
        ]);

        $exposicion->title = $request->title; 
        $exposicion->content = $request->content; 
        $exposicion->game_url = $request->game_url; 
        
        if($request->file('file')){
            $url = Storage::put('public/exposicion', $request->file('file'));
            $exposicion->image_url = $url;
        }
        $exposicion->save();

        return redirect()->route('exposicion.edit', $exposicion)->with('info', 'La exposicion fue editada');
    }

    public function destroy(Exposicion $exposicion){
        Storage::delete($exposicion->image_url);
        $exposicion->delete();

        return redirect()->route('dashboard', $exposicion)->with('info', 'La exposicion ah sido eliminada');


    }
}
