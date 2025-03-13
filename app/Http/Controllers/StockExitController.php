<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\StockExit;
use App\Models\Product;
use Illuminate\Http\Request;

class StockExitController extends Controller
{
    /**
     * Display a listing of stock exits.
     */
    public function index()
    {
        $exits = StockExit::withoutTrashed()->paginate(10);
        return view('exits.index', compact('exits'));
    }

    /**
     * Show the form for creating a new stock exit.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('exits.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created stock exit in the database and decrease the product stock.
     * Validates that the exit quantity does not exceed the available product stock.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'  => 'required|exists:products,id',
            'customer_id' => 'nullable|exists:customers,id',
            'quantity'    => 'required|integer|min:1',
            'document'    => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check if there is enough stock for the exit
        if ($request->quantity > $product->stock) {
            return redirect()->back()
                ->withErrors(['quantity' => 'La cantidad de salida excede el stock de producto disponible.'])
                ->withInput();
        }

        // Decrease the product's stock
        $product->stock -= $request->quantity;
        $product->save();

        StockExit::create($request->only('product_id', 'customer_id', 'quantity', 'document'));

        return redirect()->route('exits.index')->with('success', 'Stock exit created successfully.');
    }

    /**
     * Display the specified stock exit.
     */
    public function show(StockExit $stockExit)
    {
        return view('exits.show', compact('stockExit'));
    }

    /**
     * Soft delete the specified stock exit.
     */
    public function destroy(StockExit $stockExit)
    {
        // Optionally, you could revert the stock decrease here if needed.
        $stockExit->delete();
        return redirect()->route('exits.index')->with('success', 'Stock exit deleted successfully.');
    }

    /**
     * Display a listing of trashed stock exits.
     */
    public function trash()
    {
        $exits = StockExit::onlyTrashed()->paginate(10);
        return view('exits.trash', compact('exits'));
    }

    /**
     * Restore a soft-deleted stock exit.
     */
    public function restore($id)
    {
        StockExit::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('exits.index')->with('success', 'Stock exit restored successfully.');
    }

    /**
     * Permanently delete a stock exit from the database.
     */
    public function forceDelete($id)
    {
        StockExit::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('exits.index')->with('success', 'Stock exit permanently deleted.');
    }
}
