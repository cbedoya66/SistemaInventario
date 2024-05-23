<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Suplier;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Producto::all();
        $proveedores = Suplier::all();
        $categorias = Categoria::all();

        return view('products.products', compact('products', 'proveedores', 'categorias'));
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
        $products = new Producto();

        $products->cod_barra = $request->input('cod_barra');
        $products->nombre = $request->input('nombre');
        $products->precio = $request->input('precio');
        $products->descripcion = $request->input('descripcion');
        $products->proveedor = $request->input('proveedor');
        $products->categoria = $request->input('categoria');
        $products->placa = $request->input('placa');
        $products->stock = $request->input('stock');
        $products->impuesto = $request->input('impuesto');
        $products->estado = $request->input('estado');


        $request->validate([
            'imagen' => 'mimetypes:image/jpeg,image/jpg',

            'cod_barra' => 'required|max:50',
            'nombre' => 'required|max:100|string',
            'precio' => 'required|max:100',
            'descripcion' => 'required|max:200',
            'proveedor' => 'required|max:100',
            'estado' => 'required|max:10'
        ]);


        //Almacenar archivo imagen
        if ($request->hasFile('imagen')) {
            $name = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move(public_path('imgProductos'), $name);
            $products->imagen = $name;
        }

        $products->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $products = Producto::find($id);

        $proveedores = Suplier::all();

        return view('products.productsEdit', compact('products', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Producto::find($id);
        $proveedores = Suplier::all();

        $products->cod_barra = $request->input('cod_barra');
        $products->nombre = $request->input('nombre');
        $products->precio = $request->input('precio');
        $products->descripcion = $request->input('descripcion');
        $products->proveedor = $request->input('proveedor');
        $products->categoria = $request->input('categoria');
        $products->placa = $request->input('placa');
        $products->stock = $request->input('stock');
        $products->estado = $request->input('estado');

        $request->validate([
            'imagen' => 'mimetypes:image/jpeg,image/png,image/jpg',

            'cod_barra' => 'required|max:50',
            'nombre' => 'required|max:100|string',
            'precio' => 'required|max:100',
            'descripcion' => 'required|max:200',
            'proveedor' => 'required|max:100',
            'estado' => 'required|max:10'
        ]);


        //Almacenar archivo imagen
        if ($request->hasFile('imagen')) {
            $name = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move(public_path('imgProductos'), $name);
            $products->imagen = $name;
        }



        $products->update();

        return redirect()->route('products.index')->with('message', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function eliminarProd(string $id)
    {

        $products = Producto::find($id);

        $products->delete();

        return redirect()->route('products.index')->with('message', 'Tu productos ha sido eliminado !.');
    }

    public function stock()
    {
    }
}
