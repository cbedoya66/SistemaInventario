<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Product;
use Illuminate\Http\Request;

class BuysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categorias = Categoria::all();

        return view('compras.items', compact('products', 'categorias'));
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
        $buys = new Pedido();

        dd($request);

        /* $buys->id_pedido = $request->input('id_pedido');
        $buys->subtotal = $request->input('subtotal');
        $buys->total = $request->input('total');
        $buys->cliente_id = $request->input('cliente_id');

        $buys->save();

        return redirect()->route('buys.index')->with('message', 'Producto adicionado al carrito'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return   $id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add(Request $request)
    {


    }
}