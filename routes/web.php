<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::get('/search-products', [ProductController::class, 'search'])->name('search.products');
Route::get('/search-orders', [OrderController::class, 'search'])->name('search.orders');
