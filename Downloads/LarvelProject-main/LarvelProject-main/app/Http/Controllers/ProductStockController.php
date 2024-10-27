<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index()
    {
        $productStocks = ProductStock::with('product')->get();
        return view('product_stocks.index', compact('productStocks'));
    }

    public function create()
    {
        $products = Product::all();
        $units = ['kg', 'liter', 'item', 'piece'];
        return view('product_stocks.create', compact('products', 'units'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|in:kg,liter,item,piece',
        ]);

        ProductStock::create($validatedData);

        return redirect()->route('product_stocks.index')->with('success', 'Product stock created successfully.');
    }

    public function show(ProductStock $productStock)
    {
        return view('product_stocks.show', compact('productStock'));
    }

    public function edit(ProductStock $productStock)
    {
        $products = Product::all();
        $units = ['kg', 'liter', 'item', 'piece'];
        return view('product_stocks.edit', compact('productStock', 'products', 'units'));
    }

    public function update(Request $request, ProductStock $productStock)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|in:kg,liter,item,piece',
        ]);

        $productStock->update($validatedData);

        return redirect()->route('product_stocks.index')->with('success', 'Product stock updated successfully.');
    }

    public function destroy(ProductStock $productStock)
    {
        $productStock->delete();

        return redirect()->route('product_stocks.index')->with('success', 'Product stock deleted successfully.');
    }
}