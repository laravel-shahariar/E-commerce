<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\load_website;

Route::get('/', [load_website::class, 'home']);
Route::get('/product', [load_website::class, 'product']);
Route::get('/cart', [load_website::class, 'cart']);
Route::get('/checkout', [load_website::class, 'checkout']);
Route::get('/order_confirm', [load_website::class, 'order_confirm']);