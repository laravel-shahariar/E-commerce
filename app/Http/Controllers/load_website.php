<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class load_website extends Controller
{
    function home()
    {
        return view('home');
    }

    function product()
    {
        return view('product');
    }

    function cart()
    {
        return view('cart');
    }

    function checkout()
    {
        return view('checkout');
    }

    function order_confirm()
    {
        return view('order-confirmation');
    }

    function orders()
    {
        return view('my-orders');
    }

    function account()
    {
        return view('account');
    }

    function category()
    {
        return view('category');
    }

    function wishlist()
    {
        return view('wishlist');
    }

    function contact()
    {
        return view("contact");
    }
}
