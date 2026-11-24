<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\brand;
use App\Models\address;
use App\Models\order;
use App\Models\ordered_item;

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
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $defaultAddress = address::where('user_id', auth()->id())->where('is_default', true)->first() ?? address::where('user_id', auth()->id())->latest()->first();

        return view('checkout', compact('defaultAddress'));
    }

    function order_confirm(Request $request)
    {
        $orderId = $request->query('order_id') ?? session('last_order_id');
        $order = null;
        if ($orderId && auth()->check()) {
            $order = order::with(['items.product', 'address'])->where('user_id', auth()->id())->find($orderId);
        }
        if (!$order && auth()->check()) {
            $order = order::with(['items.product', 'address'])->where('user_id', auth()->id())->latest()->first();
        }

        return view('order-confirmation', compact('order'));
    }

    function place_order(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please log in to place an order.',
                'redirect' => route('login'),
            ], 401);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric',
        ]);

        $userId = auth()->id();

        // 1. Manage Address using address model
        $isPrimary = $request->boolean('is_primary');
        if ($isPrimary) {
            address::where('user_id', $userId)->update(['is_default' => false]);
        }

        $address = null;
        if ($request->filled('address_id')) {
            $address = address::where('user_id', $userId)->find($request->address_id);
        }

        if (!$address) {
            $address = address::where('user_id', $userId)
                ->where('address', $request->address)
                ->where('city', $request->city)
                ->where('postal_code', $request->postal_code)
                ->first();
        }

        if (!$address) {
            $address = new address();
            $address->user_id = $userId;
        }

        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone_number = $request->phone_number;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->province = $request->province;
        $address->district = $request->district ?? $request->city;
        $address->postal_code = $request->postal_code;
        if ($isPrimary || address::where('user_id', $userId)->count() === 0) {
            $address->is_default = true;
        }
        $address->save();

        // 2. Calculate totals
        $subtotal = 0;
        foreach ($request->items as $item) {
            $subtotal += ((float)$item['price'] * (int)$item['quantity']);
        }
        $tax = round($subtotal * 0.18, 2);
        $deliveryCharge = ($request->shipping === 'express') ? 50.00 : 0.00;
        $discount = 0.00;
        $grandTotal = $subtotal + $tax + $deliveryCharge - $discount;

        // 3. Create Order using order model
        $order = new order();
        $order->user_id = $userId;
        $order->address_id = $address->id;
        $order->status = 'pending';
        $order->total_price = $subtotal;
        $order->delivery_charge = $deliveryCharge;
        $order->sub_total = $subtotal;
        $order->discount = $discount;
        $order->vat = $tax;
        $order->grand_total = $grandTotal;
        $order->save();

        // 4. Create Order Items using ordered_item model
        foreach ($request->items as $itemData) {
            $prod = product::find($itemData['id']);
            $itemPrice = (float)$itemData['price'];
            $qty = (int)$itemData['quantity'];
            $itemTotal = $itemPrice * $qty;

            $orderedItem = new ordered_item();
            $orderedItem->order_id = $order->id;
            $orderedItem->product_id = $itemData['id'];
            $orderedItem->quantity = $qty;
            $orderedItem->price = $itemPrice;
            $orderedItem->discount_price = $prod ? $prod->discount_price : null;
            $orderedItem->total_price = $itemTotal;
            $orderedItem->image = $prod && $prod->image ? $prod->image : ($itemData['image'] ?? null);
            $orderedItem->images = $prod ? $prod->images : null;
            $orderedItem->status = 'pending';
            $orderedItem->views = 0;
            $orderedItem->sold_count = 0;
            $orderedItem->save();

            if ($prod) {
                $prod->increment('sold_count', $qty);
                if ($prod->stock >= $qty) {
                    $prod->decrement('stock', $qty);
                }
            }
        }

        session(['last_order_id' => $order->id]);

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
            'order_id' => $order->id,
            'order_number' => 'ORD-' . $order->id,
            'redirect' => url('/order-confirm?order_id=' . $order->id),
        ]);
    }

    function orders()
    {
        $orders = order::with(['items.product', 'address'])->where('user_id', auth()->id())->latest()->get();

        return view('my-orders', compact('orders'));
    }

    function account()
    {
        $addresses = address::where('user_id', auth()->id())->orderBy('is_default', 'desc')->latest()->get();
        return view('account', compact('addresses'));
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

    function edit_address(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:address,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $address = address::where('id', $request->id)->where('user_id', auth()->id())->firstOrFail();

        $isDefault = $request->has('is_default');

        if ($isDefault) {
            address::where('user_id', auth()->id())->where('id', '!=', $address->id)->update(['is_default' => false]);
        } elseif (address::where('user_id', auth()->id())->count() === 1) {
            $isDefault = true;
        }

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
                'message' => 'Address updated successfully!',
                'address' => $address,
            ]);
        }

        return redirect()->back()->with('success', 'Address updated successfully!');
    }

    function delete_address(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:address,id',
        ]);

        $address = address::where('id', $request->id)->where('user_id', auth()->id())->firstOrFail();

        $wasDefault = $address->is_default;
        $address->delete();

        if ($wasDefault) {
            $nextDefault = address::where('user_id', auth()->id())->latest()->first();
            if ($nextDefault) {
                $nextDefault->is_default = true;
                $nextDefault->save();
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Address deleted successfully!',
            ]);
        }

        return redirect()->back()->with('success', 'Address deleted successfully!');
    }

    function set_default_address(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:address,id',
        ]);

        $address = address::where('id', $request->id)->where('user_id', auth()->id())->firstOrFail();

        // Remove default from all user addresses
        address::where('user_id', auth()->id())->update(['is_default' => false]);

        // Set selected address as default
        $address->is_default = true;
        $address->save();

        return redirect()->back()->with('success', 'Default address updated successfully!');
    }

    function category(Request $request, $category_name)
    {
        $query = product::query();

        if ($category_name !== 'all') {
            $cat = category::where('slug', $category_name)->orWhere('name', 'like', '%' . $category_name . '%')->first();

            if ($cat) {
                $query->where('category_id', $cat->id);
            } else {
                $query->whereHas('category', function ($q) use ($category_name) {
                    $q->where('slug', $category_name)->orWhere('name', 'like', '%' . $category_name . '%');
                });
            }
        }

        // Filter by brand if provided in request
        if ($request->filled('brand')) {
            $brandParam = $request->brand;
            if (is_array($brandParam)) {
                $query->whereIn('brand_id', $brandParam);
            } elseif (is_numeric($brandParam)) {
                $query->where('brand_id', $brandParam);
            } else {
                $brandIds = explode(',', $brandParam);
                if (count($brandIds) > 1 && is_numeric($brandIds[0])) {
                    $query->whereIn('brand_id', $brandIds);
                } else {
                    $query->whereHas('brand', function ($bQuery) use ($brandParam) {
                        $bQuery->where('name', $brandParam)->orWhere('id', $brandParam);
                    });
                }
            }
        }

        // Filter by rating if provided in request
        if ($request->filled('rating')) {
            $ratingParam = $request->rating;
            if (is_array($ratingParam)) {
                $minRating = min(array_map('floatval', $ratingParam));
                $query->where('rating', '>=', $minRating);
            } else {
                $query->where('rating', '>=', (float)$ratingParam);
            }
        }

        $inStockCount = (clone $query)->where('stock', '>', 0)->count();
        $outOfStockCount = (clone $query)->where('stock', '<=', 0)->count();

        // Calculate rating counts for 1 to 5 stars for the current category
        $baseQuery = product::query();
        if ($category_name !== 'all') {
            $cat = category::where('slug', $category_name)->orWhere('name', 'like', '%' . $category_name . '%')->first();
            if ($cat) {
                $baseQuery->where('category_id', $cat->id);
            } else {
                $baseQuery->whereHas('category', function ($q) use ($category_name) {
                    $q->where('slug', $category_name)->orWhere('name', 'like', '%' . $category_name . '%');
                });
            }
        }
        $ratingCounts = [
            5 => (clone $baseQuery)->where('rating', '>=', 5.0)->count(),
            4 => (clone $baseQuery)->where('rating', '>=', 4.0)->count(),
            3 => (clone $baseQuery)->where('rating', '>=', 3.0)->count(),
            2 => (clone $baseQuery)->where('rating', '>=', 2.0)->count(),
            1 => (clone $baseQuery)->where('rating', '>=', 1.0)->count(),
        ];

        // Get brands with product counts for this category
        $brands = brand::withCount(['product' => function ($q) use ($category_name) {
            if ($category_name !== 'all') {
                $cat = category::where('slug', $category_name)->orWhere('name', 'like', '%' . $category_name . '%')->first();
                if ($cat) {
                    $q->where('category_id', $cat->id);
                } else {
                    $q->whereHas('category', function ($catQuery) use ($category_name) {
                        $catQuery->where('slug', $category_name)->orWhere('name', 'like', '%' . $category_name . '%');
                    });
                }
            }
        }])->get();

        $products = $query->paginate(6)->withQueryString();

        $maxProductPrice = product::max('price');
        $sliderMax = $maxProductPrice ? (int)ceil($maxProductPrice) : 200000;
        if ($sliderMax < 200000) {
            $sliderMax = 200000;
        }

        return view('category', compact('category_name', 'products', 'sliderMax', 'inStockCount', 'outOfStockCount', 'brands', 'ratingCounts'));
    }

    function wishlist()
    {
        return view('wishlist');
    }

    function search(Request $request)
    {
        $query = $request->input('search') ?? $request->input('q') ?? $request->input('query') ?? '';

        $products = collect();
        if (!empty(trim($query))) {
            $searchTerm = trim($query);
            $products = product::where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')->orWhere('description', 'like', '%' . $searchTerm . '%')->orWhereHas('category', function ($sub) use ($searchTerm) {
                        $sub->where('name', 'like', '%' . $searchTerm . '%');
                    })->orWhereHas('brand', function ($sub) use ($searchTerm) {
                        $sub->where('name', 'like', '%' . $searchTerm . '%');
                    });
            })->get();
        }

        $view = view()->exists('search') ? 'search' : 'components.search';
        return view($view, compact('products', 'query'));
    }

    function contact()
    {
        return view("contact");
    }
}
