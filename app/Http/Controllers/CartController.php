<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {

        if ($request->id) {
            $producto = Producto::find($request->id);

            if (empty($producto))
                return redirect()->route('add');

            Cart::add(
                $producto->id,
                $producto->nombre,
                1,
                $producto->precio,
                ["imagen" => $producto->imagen]

            );
        } else {

            $producto = Producto::find($request->rowId);

            if (empty($producto))
                return redirect()->route('add');

            Cart::add(
                $producto->id,
                $producto->nombre,
                $request->qty,
                $producto->precio,
                ["imagen" => $producto->imagen]

            );
        }

        $clientes = Cliente::all();

        $pedidos = Pedido::all('pedido_id');

        if (!$pedidos) {
            $pedidos = 1;
        }


        return redirect()->route('indexItem', compact('clientes', 'pedidos'))->with('message', 'Producto ' . $producto->nombre . ' agregado al carrito');
    }

    public function store(Request $request)
    {

        $clientes = Cliente::all(['cliente_id', 'nombre']);
        $categorias = Categoria::all('nombre');

        $Cartcontent = Cart::content();
        $subtotal = Cart::subtotal();
        $impuesto = Cart::tax();
        $total = Cart::total();


        //Crear el pedido
        $pedido = new Pedido();

        $pedido->pedido_id = $request->input('pedido_id');
        $pedido->subtotal = $subtotal;
        $pedido->impuesto = $impuesto;
        $pedido->total = $total;
        $pedido->estado = 'Despachado';
        $pedido->cliente_id = $request->input('cliente_id');

        $pedido->save();
        /*  $pedido = Pedido::create([
            'pedido_id' => $request->input('pedido_id'),
            'subtotal' => $subtotal,
            'impuesto' => $impuesto,
            'total' => $total,
            'estado' => 'Despachado',
            'cliente_id' => $request->input('cliente_id'),
        ]); */

        // Crear los productos del pedido
        foreach ($Cartcontent as $item) {
            $pedido->productos()->attach($item->id, [
                'cantidad' => $item->qty
            ]);
        }
        // Vaciar el carrito
        Cart::destroy();


        $pedidos = Pedido::all('pedido_id');

        return view('pedidos.items', compact('clientes', 'pedidos', 'categorias'));
    }

    public function checkout()
    {
        $pedidos = Pedido::orderBy('pedido_id', 'desc')->first();

        $clientes = Cliente::all(['cliente_id', 'nombre']);


        /*  if (isset($pedidos)) {
            $pedidos = 1;
        } */

        return view('pedidos.checkout', compact('clientes', 'pedidos'));
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->back()->with('message', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->back()->with('message', 'Se ha eliminado el pedido');
    }
}
