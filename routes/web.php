<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\BuysController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupliersController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/setting', SettingController::class)->names('setting');
    Route::resource('/users', UserController::class)->names('users');

    //usuarios Roles y permisos
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisionController::class)->names('permisos');
    Route::resource('/usuarios', AsignarController::class)->names('asignar');

    //proveedores
    Route::resource('/proveedores', SupliersController::class)->names('proveedores');
    Route::get('/proveedores/eliminar/{id}', [SupliersController::class, 'eliminarProv']);

    //Productos
    Route::resource('/products', ProductoController::class)->names('products');
    Route::get('/products/eliminar/{id}', [ProductoController::class, 'eliminarProd']);

    //Clientes
    Route::resource('/clientes', ClienteController::class)->names('clientes');
    Route::get('/clientes/eliminar/{id}', [ClienteController::class, 'eliminarCliente']);


    //Vista para productos de pedidos
    Route::resource('/pedido', PedidoController::class)->names('pedido');
    Route::get('/pedidos', [FrontController::class, 'index'])->name('indexItem');
    Route::post('/pedidos', [FrontController::class, 'filtroCategoria'])->name('filtroCategoria');

    //carrito
    Route::post('cart/add', [CartController::class, 'add'])->name('add');
    Route::post('cart/Mas', [CartController::class, 'Mas'])->name('Mas');
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('cart/clear', [CartController::class, 'clear'])->name('clear');
    Route::post('cart/removeItem', [CartController::class, 'removeItem'])->name('removeItem');
    Route::post('cart/store', [CartController::class, 'store'])->name('store');

    //Categorias
    Route::resource('/categorias', CategoriasController::class)->names('categorias');
    Route::get('/categorias/eliminar/{id}', [CategoriasController::class, 'eliminarCategoria']);
    Route::post('/categorias/show', [CategoriasController::class, 'show']);
});
