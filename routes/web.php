<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/', [ProductController::class, 'home'])->name('product.home');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/filter', [ProductController::class, 'filterByCategory'])->name('product.filter');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
Route::get('/basket', [OrderController::class, 'basket'])->name('order.basket');


Route::resource('comments', CommentController::class)->
middleware(['auth', 'verified']);;
