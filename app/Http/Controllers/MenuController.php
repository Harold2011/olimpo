<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = menu::all();
        return view('menu.menu', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'decripcion' => 'required|string',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'precio' => 'required|numeric',
        ]);
    
        $url = null;
    
        if ($request->hasFile('url')) {
            $imageName = time().'.'.$request->url->extension();  
            $request->url->move(public_path('images'), $imageName);
            $url = 'images/' . $imageName;
        }
    
        menu::create([
            'nombre' => $request->nombre,
            'decripcion' => $request->decripcion,
            'url' => $url,
            'precio' => $request->precio,
        ]);
    
        return redirect()->route('menu.index')->with('success', 'Menú creado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'decripcion' => 'required|string',
            'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'precio' => 'required|numeric',
        ]);

        $menu = menu::findOrFail($id);

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($menu->url && file_exists(public_path($menu->url))) {
                unlink(public_path($menu->url));
            }

            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images'), $imageName);
            $menu->url = 'images/' . $imageName;
        }

        $menu->nombre = $request->nombre;
        $menu->decripcion = $request->decripcion;
        $menu->precio = $request->precio;

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menú actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($menu->url && file_exists(public_path($menu->url))) {
            unlink(public_path($menu->url));
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menú eliminado exitosamente.');
    }
}
