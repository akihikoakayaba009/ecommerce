<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController; // Importe o controller HomeController

Route::get('/', [HomeController::class, 'index'])->name('home');
use App\Http\Controllers\ProductController;


use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redireciona para a página principal após o logout
})->name('logout');
use App\Http\Controllers\CartController;

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
//ROTA PARA ver detalhes dos produtos 
Route::get('/produto/{id}', 'App\Http\Controllers\ProductController@show')->name('show');
// Rotas para produtos
Route::get('/produtos', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/produtos/criar', 'App\Http\Controllers\ProductController@create')->name('products.create');
Route::post('/produtos', 'App\Http\Controllers\ProductController@store')->name('products.store');
Route::get('/produtos/{produto}', 'App\Http\Controllers\ProductController@show')->name('products.form');
Route::get('/produtos/{produto}/editar', 'App\Http\Controllers\ProductController@edit')->name('products.edit');
Route::put('/produtos/{produto}', 'App\Http\Controllers\ProductController@update')->name('products.update');
Route::delete('/produtos/{produto}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
 //sobre nós

 Route::get('/sobre-nos', function () {
    return view('sobre_nos');
})->name('sobre_nos');