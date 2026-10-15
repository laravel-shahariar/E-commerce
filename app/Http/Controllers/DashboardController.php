<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\brand;
use App\Models\size;

class DashboardController extends Controller
{
    public function home() {
        $total_product = product::all();
        return view("dashboard.home", compact("total_product"));
    }

    public function productAdd() {
        $categories = category::all();
        $brands = brand::all();
        $sizes = size::all();
        return view("dashboard.product-add", compact("categories", "brands", "sizes"));
    }

    public function productStore(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'size_id' => 'nullable|exists:sizes,id',
            'image' => 'nullable',
            'status' => 'required|in:active,draft,inactive',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('photo');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $imageName);
            $validated['image'] = $imageName;
        }

        product::create($validated);

        return redirect()->route('dashboard.product')->with('success', 'Product created successfully!');
    }

    public function productEdit($id) {
        $product = product::findOrFail($id);
        $categories = category::all();
        $brands = brand::all();
        $sizes = size::all();
        return view("dashboard.product-detail", compact("product", "categories", "brands", "sizes"));
    }

    public function productUpdate(Request $request, $id) {
        $product = product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'size_id' => 'nullable|exists:sizes,id',
            'image' => 'nullable',
            'status' => 'required|in:active,draft,inactive',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('photo');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $imageName);
            $validated['image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->back()->with('success', 'Product details updated successfully!');
    }
}
