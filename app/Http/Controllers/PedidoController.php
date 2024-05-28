<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\pedido_factura;
use App\Models\menu;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            // Si el usuario es administrador, obtener todos los pedidos
            $pedidos = pedido::with(['menu', 'user'])->get();
        } else {
            // Si el usuario no es administrador, obtener solo los pedidos del usuario autenticado
            $pedidos = pedido::with(['menu', 'user'])->where('user_id', auth()->id())->get();
        }

        return view('pedido.pedido', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Obtener la fecha actual
        $fecha = now();

        // Crear el pedido
        Pedido::create([
            'menu_id' => $request->menu_id,
            'cantidad' => $request->cantidad,
            'user_id' => auth()->id(), // Obtener el ID del usuario autenticado
            'fecha' => $fecha, // Agregar la fecha actual
            'estado' => 'activo' // Estado por defecto
        ]);

        // Redirigir de vuelta a la carta de restaurante con un mensaje de éxito
        return redirect()->route('menuclient.index')->with('success', 'Pedido adicionado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pedido $pedido)
    {
         // Cambiar el estado del pedido a inactivo
         $pedido->estado = 'inactivo';
         $pedido->save();
 
         // Redirigir de vuelta a la lista de pedidos con un mensaje de éxito
         return redirect()->route('pedido.index')->with('success', 'Estado del pedido actualizado a inactivo.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido = pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedido.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
