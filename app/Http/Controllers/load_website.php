<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class load_website extends Controller
{
    function home()
    {
        $products = product::take(5)->inRandomOrder()->get();
        return view('home', compact('products'));
    }

    function product($product_id)
    {
        return view('product', compact('product_id'));
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

    function category($category_name)
    {
        return view('category', compact('category_name'));
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
