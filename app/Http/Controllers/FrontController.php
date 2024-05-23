<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all('nombre');


        return view('pedidos.items', compact('productos', 'categorias'));
    }

    public function filtroCategoria(Request $request)
    {
        $categorias = Categoria::all('nombre');
        $productos = Producto::query()
            ->where('categoria', '=', $request->categoria)
            ->get();


        return view('pedidos.items', compact('productos', 'categorias'));
    }
}
