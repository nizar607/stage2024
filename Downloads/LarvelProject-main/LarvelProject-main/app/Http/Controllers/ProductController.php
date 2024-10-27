<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::with(['category', 'productStock']);

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'expiration_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'expiration_date' => $request->input('expiration_date'),
            'image' => $imagePath,
            // 'user_id' => auth()->id()
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    // Show form for editing a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'expiration_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'expiration_date' => $request->input('expiration_date'),
            'image' => $imagePath
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}