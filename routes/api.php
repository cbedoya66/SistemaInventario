<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('proveedores', function () {
    return datatables()
        ->eloquent(\App\Models\Suplier::query())
        ->addColumn('btnE', 'actionsE')
        ->rawColumns(['btnE'])
        ->toJson();
});

Route::get('products', function () {
    return datatables()
        ->eloquent(\App\Models\Producto::query())
        ->addColumn('btnP', 'actionsP')
        ->rawColumns(['btnP'])
        ->toJson();
});

Route::get('clientes', function () {
    return datatables()
        ->eloquent(\App\Models\Cliente::query())
        ->addColumn('btnC', 'actionsC')
        ->rawColumns(['btnC'])
        ->toJson();
});

Route::get('categorias', function () {
    return datatables()
        ->eloquent(\App\Models\Categoria::query())
        ->addColumn('btnCat', 'actionsCat')
        ->rawColumns(['btnCat'])
        ->toJson();
});

Route::get('categorias', function () {
    return datatables()
        ->eloquent(\App\Models\Categoria::query())
        ->addColumn('btnCat', 'actionsCat')
        ->rawColumns(['btnCat'])
        ->toJson();
});

Route::get('buys', function () {
    return datatables()
        ->eloquent(\App\Models\Producto::query())
        ->addColumn('btnCompras', 'actionsComp')
        ->rawColumns(['btnCompras'])
        ->toJson();
});
