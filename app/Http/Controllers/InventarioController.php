<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
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
        $inventarios = Inventario::all();
        return view('inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Crear un nueva Gasto en la base de datos
        Inventario::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Inventario creado correctamente.');

        return redirect()->route('inventarios.index')
                         ->with('success', 'Inventario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Gasto por su ID
        $inventarios = Inventario::findOrFail($id);

        return view('inventarios.show', compact('inventarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Gasto por su ID
        $inventarios = Inventario::findOrFail($id);
        return view('inventarios.edit', compact('inventarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Actualizar Gasto en la base de datos
        $inventarios = Inventario::findOrFail($id);
        $inventarios->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Inventario actualizado correctamente.');

        return redirect()->route('inventarios.index')
                         ->with('success', 'Inventario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Gasto de la base de datos
        $inventarios = Inventario::findOrFail($id);
        $inventarios->delete();

        return redirect()->route('inventarios.index')
                         ->with('success', 'Inventario eliminado exitosamente');
    }

    /**
     * Método privado para validar el request.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string|max:50',
            'tamaño' => 'nullable|string|max:30',
            'tiempo1' => 'nullable|string|max:15',
            'tiempo2' => 'nullable|string|max:15',
            'tiempo3' => 'nullable|string|max:15',
            'tiempo4' => 'nullable|string|max:15',
            'lavado' => 'nullable|string|max:15',
            'deposito' => 'nullable|string|max:15',
            'cantidad' => 'nullable|string|max:10',
            'disponible' => 'nullable|string|max:10',
            'estado' => 'nullable|string|max:10'
        ]);
    }
}
