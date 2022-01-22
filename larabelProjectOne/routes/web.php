<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class,'index'] ) -> name('product.index');

Route::get('/edit/{id}', [ProductController::class,'edit'] ) -> name('product.edit');

Route::delete('/destroy/{id}', [ProductController::class,'destroy'] ) -> name('product.destroy');

Route::get('/create', [ProductController::class,'create'] ) -> name('product.create');

Route::post('/store', [ProductController::class,'store'] ) -> name('product.store');

Route::post('/update/{id}', [ProductController::class,'update'] ) -> name('product.update');


// routes for users

Route::get('/clients', [UserController::class,'index'] ) -> name('client.index');

Route::get('/edit/{id}/clients', [UserController::class,'edit'] ) -> name('client.edit');

Route::delete('/destroy/{id}/clients', [UserController::class,'destroy'] ) -> name('client.destroy');

Route::get('/create/clients', [UserController::class,'create'] ) -> name('client.create');

Route::post('/store/clients', [UserController::class,'store'] ) -> name('client.store');

Route::post('/update/{id}/clients', [UserController::class,'update'] ) -> name('client.update');

// routes for orders
Route::get('/venta', [OrderController::class,'index'] ) -> name('order.index');

Route::get('/sell', [OrderController::class,'show'] ) -> name('order.sell');


Route::get('/hola', function () {
    //return view('welcome');
    return view('welcome');
});
