<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products (excluding soft-deleted ones).
     */
    public function index()
    {
        $products = Product::withoutTrashed()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Product::create($request->only(['name', 'description']));
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified product details.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product->update($request->only(['name', 'description']));
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Soft delete the specified product.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    /**
     * Restore a soft-deleted product.
     */
    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('products.index')->with('success', 'Producto restaurado exitosamente.');
    }

    /**
     * Permanently delete a product from the database.
     */
    public function forceDelete($id)
    {
        Product::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado permanentemente.');
    }

    /**
     * Display a listing of the trashed products.
     */
    public function trash()
    {
        $products = Product::onlyTrashed()->paginate(10);
        return view('products.trash', compact('products'));
    }

}
