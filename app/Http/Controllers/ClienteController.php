<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.listClientes', compact('clientes'));
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
        $cliente = new Cliente();

        $request->validate([

            'nombre' => 'required|max:100|string',
            'dependencia' => 'required|max:100|string',
            'estado' => 'required|string',
        ]);

        $cliente->cedula = $request->input('cedula');
        $cliente->nombre = $request->input('nombre');
        $cliente->dependencia = $request->input('dependencia');
        $cliente->estado = $request->input('estado');

        $cliente->save();

        return redirect()->route('clientes.index')->with('message', 'El Cliente ha sido creado !.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);

        $request->validate([
            'nombre' => 'required|max:100|string',
            'dependencia' => 'required|max:value:100|string',
            'estado' => 'required|string'
        ]);

        $cliente->cedula = $request->input('cedula');
        $cliente->nombre = $request->input('nombre');
        $cliente->dependencia = $request->input('dependencia');
        $cliente->estado = $request->input('estado');

        $cliente->update();

        return redirect()->route('clientes.index')->with('message', 'El Cliente ha sido actualizado !.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function eliminarCliente(string $id)
    {

        $cliente = Cliente::find($id);

        $cliente->delete();

        return redirect()->route('clientes.index')->with('message', 'Tu Cliente ha sido eliminado !.');
    }
}
