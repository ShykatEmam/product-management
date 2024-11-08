<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
//    return view('index');
    return redirect('/products');
});

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'createProduct'])->name('products.create');
Route::post('/productsStore',[ProductController::class,'storeProduct'])->name('products.store');
Route::get('/products/{id}',[ProductController::class,'showProduct'])->name('products.show');
Route::get('/products/{id}/edit',[ProductController::class,'editProduct'])->name('products.edit');
Route::put('products/{id}',[ProductController::class,'updateProduct'])->name('products.update');
Route::delete('/products/{id}',[ProductController::class,'deleteProduct'])->name('products.delete');
