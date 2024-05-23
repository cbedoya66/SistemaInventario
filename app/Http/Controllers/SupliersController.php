<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SupliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Suplier::all();
        return view('proveedores.proveedores', compact('proveedores'));
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

        $proveedores = new Suplier();

        $proveedores->nit_proveedor = $request->input('nit_proveedor');
        $proveedores->nombre = $request->input('nombre');
        $proveedores->direccion = $request->input('direccion');
        $proveedores->telefono = $request->input('telefono');
        $proveedores->contacto = $request->input('contacto');
        $proveedores->estado = $request->input('estado');

        $proveedores->save();

        return back();
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
        $proveedores = Suplier::find($id);


        return view('proveedores.proveedoresEdit', compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $proveedores = Suplier::find($id);

        $request->validate([
            'nit_proveedor' => 'required|max:50',
            'nombre' => 'required|max:100|string',
            'direccion' => 'required|max:100',
            'telefono' => 'required|max:200',
            'contacto' => 'required|max:100',
            'estado' => 'required|max:10'
        ]);

        $proveedores->nit_proveedor = $request->input('nit_proveedor');
        $proveedores->nombre = $request->input('nombre');
        $proveedores->direccion = $request->input('direccion');
        $proveedores->telefono = $request->input('telefono');
        $proveedores->contacto = $request->input('contacto');
        $proveedores->estado = $request->input('estado');

        $proveedores->update();

        return redirect()->route('proveedores.index')->with('message', 'El proveedor ha sido actualizado !.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function eliminarProv(string $id)
    {

        $proveedor = Suplier::find($id);

        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('message', 'Tu proveedor ha sido eliminado !.');
    }
}