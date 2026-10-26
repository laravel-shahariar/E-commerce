<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\address;

class load_website extends Controller
{
    function home()
    {
        $products = product::take(5)->inRandomOrder()->get();
        $latestProducts = product::latest()->take(5)->get();
        return view('home', compact('products', 'latestProducts'));
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

    function add_address(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $isDefault = $request->has('is_default');

        if ($isDefault) {
            address::where('user_id', auth()->id())->update(['is_default' => false]);
        } elseif (address::where('user_id', auth()->id())->count() === 0) {
            $isDefault = true;
        }

        $address = new address();
        $address->user_id = auth()->id();
        $address->name = $request->name;
        $address->phone_number = $request->phone_number;
        $address->email = $request->email;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->postal_code = $request->postal_code;
        $address->address = $request->address;
        $address->is_default = $isDefault;
        $address->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Address added successfully!',
                'address' => $address,
            ]);
        }

        return redirect()->back()->with('success', 'Address added successfully!');
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
