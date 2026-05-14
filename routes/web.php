<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\InventoryController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\AnalystController;

Route::get('/', [ProductController::class, 'shop']);
//ruta para categorias
Route::resource('categories', CategoryController::class);
//ruta para productos
Route::resource('products', ProductController::class);
//ruta para dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//ruta para movimientos de inventario
Route::resource('inventory', InventoryController::class)->only(['index', 'create', 'store']);
//ruta para catálogo público
Route::get('/shop', [ProductController::class, 'shop'])->name('products.shop');
//ruta para detalle producto público
Route::get('/shop/{slug}', [ProductController::class, 'showShop'])->name('products.show-shop');
// Rutas para carrito de compras
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
//rutas para checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
//ruta de ordenes
Route::resource('orders', OrderController::class)->only(['index','show','edit','update']);
//rutas para analista
Route::get('/analyst', [AnalystController::class, 'index'])->name('analyst.index');