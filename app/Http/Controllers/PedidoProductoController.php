<?php

namespace App\Http\Controllers;

use App\Models\PedidoProducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PedidoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pedidoProductos = PedidoProducto::paginate();

        return view('pedido-producto.index', compact('pedidoProductos'))
            ->with('i', ($request->input('page', 1) - 1) * $pedidoProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pedidoProducto = new PedidoProducto();

        return view('pedido-producto.create', compact('pedidoProducto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PedidoProductoRequest $request): RedirectResponse
    {
        PedidoProducto::create($request->validated());

        return Redirect::route('pedido-productos.index')
            ->with('success', 'PedidoProducto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pedidoProducto = PedidoProducto::find($id);

        return view('pedido-producto.show', compact('pedidoProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pedidoProducto = PedidoProducto::find($id);

        return view('pedido-producto.edit', compact('pedidoProducto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PedidoProductoRequest $request, PedidoProducto $pedidoProducto): RedirectResponse
    {
        $pedidoProducto->update($request->validated());

        return Redirect::route('pedido-productos.index')
            ->with('success', 'PedidoProducto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PedidoProducto::find($id)->delete();

        return Redirect::route('pedido-productos.index')
            ->with('success', 'PedidoProducto deleted successfully');
    }
}
