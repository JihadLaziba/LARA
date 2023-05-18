<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\ProduitController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
 })->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/index', [ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');;
Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    
            
});

require __DIR__.'/auth.php';
Route::middleware('guest')->group(function () {
    Route::get('/produits', [ProduitController::class, 'index'])->name('produits');
    Route::get('cart', [ProduitController::class, 'cart'])->name('cart');
    Route::patch('update-cart', [ProduitController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ProduitController::class, 'remove'])->name('remove.from.cart');
    Route::get('add-to-cart/{id}', [ProduitController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ProduitController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ProduitController::class, 'remove'])->name('remove.from.cart');
});