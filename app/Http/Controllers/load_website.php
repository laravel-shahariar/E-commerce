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
        return view('order_confirmation');
    }
}
