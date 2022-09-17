<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GuiaController extends Controller
{
    public function index(){
        $guias = Guia::all();
        return view('guia.index', compact('guias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "idioma" => "required",
            "file" => "required"
        ]);
        
        if($request->file('file')){
            $url = Storage::put('public/guia', $request->file('file'));
            $request->merge([
                "image_url" => $url
            ]);
        }
        $guia = Guia::create($request->all());

        return redirect()->route('guia.edit', $guia)->with('info', 'El guia fue creada con éxito');
    }

    public function edit(Guia $guia)
    {
        return view('guia.edit', compact('guia'));
    }

    public function update(Request $request, Guia $guia)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "idioma" => "required|in:español,portugués,inglés,alemán,italiano,chino",
        ]);

        $guia->name = $request->name; 
        $guia->email = $request->email; 
        $guia->idioma = $request->idioma; 
        
        if($request->file('file')){
            $url = Storage::put('public/guia', $request->file('file'));
            $guia->image_url = $url;
        }
        $guia->save();

        return redirect()->route('guia.edit', $guia)->with('info', 'El guia fue editada');
    }

    public function destroy(Guia $guia){
        Storage::delete($guia->image_url);
        $guia->delete();

        return redirect()->route('dashboard', $guia)->with('info', 'El guia ah sido eliminada');


    }
}
