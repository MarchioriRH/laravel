<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clientes = Cliente::paginate(5);  // Obtener todos los clientes paginados
            return response()->view('cliente.index', compact('clientes'));
        } catch (\Exception $e) {
            Log::error('Error in ClienteController@index: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
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
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:clientes,email',  // Validar el formato y unicidad
        ]);

        // Crear el cliente utilizando asignación masiva
        Cliente::create($validated);

        // Redireccionar con un mensaje de éxito
        session()->flash('success', 'Cliente creado con éxito');
        return redirect(200)->back()->with('success', 'Cliente creado con éxito');
    }


    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //$clientes = Cliente::find($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->update();
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();  // Eliminar el cliente
        return redirect()->back()->with('success', 'Cliente eliminado con éxito');
    }

}
