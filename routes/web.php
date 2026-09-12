<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\load_website;

Route::get('/', [load_website::class, 'home']);
Route::get('/product', [load_website::class, 'product']);
Route::get('/cart', [load_website::class, 'cart'])->name('cart');
Route::get('/account', [load_website::class, 'account'])->name('account');
Route::get('/category', [load_website::class, 'category']);
Route::get('/checkout', [load_website::class, 'checkout']);
Route::get('/order-confirm', [load_website::class, 'order_confirm']);
Route::get('/orders', [load_website::class, 'orders']);
Route::get('/wishlist', [load_website::class, 'wishlist']);
Route::get('/contact', [load_website::class, 'contact']);