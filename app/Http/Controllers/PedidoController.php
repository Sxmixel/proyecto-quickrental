<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-gastos|crear-gastos|editar-gastos|borrar-gastos', ['only' => ['index']]);
         $this->middleware('permission:crear-gastos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-gastos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-gastos', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Crear un nueva Gasto en la base de datos
        Pedido::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Pedido creado correctamente.');

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Gasto por su ID
        $pedidos = Pedido::findOrFail($id);

        return view('pedidos.show', compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Gasto por su ID
        $pedidos = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedidos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Actualizar Gasto en la base de datos
        $pedidos = Pedido::findOrFail($id);
        $pedidos->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Pedido actualizado correctamente.');

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Gasto de la base de datos
        $pedidos = Pedido::findOrFail($id);
        $pedidos->delete();

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido eliminado exitosamente');
    }

    /**
     * Método privado para validar el request.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string|max:50',
            'telefono' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:100',
            'objeto' => 'nullable|string|max:30',
            'cantidad' => 'nullable|string|max:30',
            'tiempo' => 'nullable|string|max:5',
            'dia' => 'nullable|string|max:15',
            'hora' => 'nullable|string|max:10',
            'dirección' => 'nullable|string|max:70',
            'estado' => 'nullable|string|max:20'
        ]);
    }
}