<?php

namespace App\Http\Controllers;

use App\Models\anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anuncio = anuncio::all();
        return view('anuncios.anuncios', compact('anuncio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('url')) {
            $imageName = time().'.'.$request->url->extension();  
            $request->url->move(public_path('images'), $imageName);
            $url = 'images/' . $imageName;
        }

        Anuncio::create([
            'nombre' => $request->nombre,
            'url' => $url,
        ]);

        return redirect()->route('anuncio.index')->with('success', 'Anuncio registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(anuncio $anuncio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('anuncios.edit', compact('anuncio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $anuncio = Anuncio::findOrFail($id);

        if ($request->hasFile('url')) {
            if (file_exists(public_path($anuncio->url))) {
                unlink(public_path($anuncio->url));
            }
            $imageName = time().'.'.$request->url->extension();  
            $request->url->move(public_path('images'), $imageName);
            $anuncio->url = 'images/' . $imageName;
        }

        $anuncio->nombre = $request->nombre;
        $anuncio->save();

        return redirect()->route('anuncio.index')->with('success', 'Anuncio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        
        // Elimina la imagen del servidor
        if (file_exists(public_path($anuncio->url))) {
            unlink(public_path($anuncio->url));
        }
        
        $anuncio->delete();
        return redirect()->route('anuncio.index')->with('success', 'Anuncio eliminado con éxito');
    }
}
