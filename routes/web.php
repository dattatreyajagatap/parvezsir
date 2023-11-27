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

Route::get('/',  [ProductController::class, 'index'])->name('product.create');

Route::get('/about', function(){
    return view('about');
});

Route::get('/product/view', [ProductController::class, 'index']);

Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

Route::post('/addproduct', [ProductController::class, 'store']);