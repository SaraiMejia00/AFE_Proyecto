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
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\RegisterController;

//rutas de autenticación
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
//rutas de registro
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');
//ruta de vista de tienda
Route::get('/', [ProductController::class, 'shop']);
//ruta para catálogo público
Route::get('/shop', [ProductController::class, 'shop'])->name('products.shop');
//ruta para detalle producto público
Route::get('/shop/{slug}', [ProductController::class, 'showShop'])->name('products.show-shop');
/*
|--------------------------------------------------------------------------
| Cliente autenticado
|--------------------------------------------------------------------------
*/
Route::middleware(['checkrole:admin,manager,analyst,customer'])
    ->group(function () {
        Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{slug}',[CartController::class, 'add'])->name('cart.add');
        Route::delete('/cart/remove/{id}',[CartController::class, 'remove'])->name('cart.remove');
        Route::put('/cart/update/{id}',[CartController::class, 'update'])->name('cart.update');
        Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/process',[CheckoutController::class, 'process'])->name('checkout.process');
        Route::get('/order-success/{id}',[CheckoutController::class, 'success'])->name('checkout.success');
    });
/*
|--------------------------------------------------------------------------
| Rutas Administrativas
*/
Route::middleware(['checkrole:admin,manager'])->group(function () {
        Route::resource('categories',CategoryController::class);
        Route::resource('products',ProductController::class);
        Route::resource('inventory',InventoryController::class)->only(['index','create','store']);
        Route::resource('orders',OrderController::class)->only(['index','show','edit','update']);
    });
/*
|--------------------------------------------------------------------------
| Analista
*/
Route::middleware(['checkrole:admin,analyst'])->group(function () {
        Route::get('/analyst',[AnalystController::class, 'index'])->name('analyst.index');

    });

Route::middleware(['checkrole:admin,analyst'])->group(function () {
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    });