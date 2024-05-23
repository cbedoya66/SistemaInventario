<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.listaCategorias', compact('categorias'));
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

        $categorias = new Categoria();

        $request->validate([
            'nombre' => 'required|max:100',
            'estado' => 'required'
        ]);

        $categorias->nombre = $request->input('nombre');
        $categorias->estado = $request->input('estado');

        $categorias->save();

        return redirect()->route('categorias.index')->with('message', 'Tu Categoría ha sido creada !.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Session::put("categoria_id", $id);

        $products = Producto::all();
        $proveedores = Suplier::all();
        $categorias = Categoria::all();

        return view('products.products', compact('products', 'proveedores', 'categorias'));
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

        $request->validate([
            'nombre' => 'required|max:100',
            'estado' => 'required'
        ]);

        $categorias = Categoria::findOrFile($id);
        $categorias->fill($request->all());


        //$categorias->nombre = $request->input('nombre');
        //$categorias->estado = $request->input('estado');

        $categorias->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function eliminarCategoria(string $id)
    {

        $categoria = Categoria::findOrFile($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('message', 'Tu categoría ha sido eliminado !.');
    }
}
