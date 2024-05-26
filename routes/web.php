<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
// Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

