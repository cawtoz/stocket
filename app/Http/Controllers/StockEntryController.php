<?php

namespace App\Http\Controllers;

use App\Models\StockEntry;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    /**
     * Display a listing of stock entries.
     */
    public function index()
    {
        $entries = StockEntry::withoutTrashed()->paginate(10);
        return view('entries.index', compact('entries'));
    }

    /**
     * Show the form for creating a new stock entry.
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('entries.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created stock entry in the database and increase the product stock.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'  => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity'    => 'required|integer|min:1',
            'document'    => 'nullable|string|max:255',
        ]);

        // Increase the product's stock
        $product = Product::findOrFail($request->product_id);
        $product->stock += $request->quantity;
        $product->save();

        StockEntry::create($request->only('product_id', 'supplier_id', 'quantity', 'document'));

        return redirect()->route('entries.index')->with('success', 'Stock entry created successfully.');
    }

    /**
     * Display the specified stock entry.
     */
    public function show(StockEntry $stockEntry)
    {
        return view('entries.show', compact('stockEntry'));
    }

    /**
     * Soft delete the specified stock entry.
     */
    public function destroy(StockEntry $stockEntry)
    {
        // Optionally, you could revert the stock increase here if needed.
        $stockEntry->delete();
        return redirect()->route('entries.index')->with('success', 'Stock entry deleted successfully.');
    }

    /**
     * Display a listing of trashed stock entries.
     */
    public function trash()
    {
        $entries = StockEntry::onlyTrashed()->paginate(10);
        return view('entries.trash', compact('entries'));
    }

    /**
     * Restore a soft-deleted stock entry.
     */
    public function restore($id)
    {
        StockEntry::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('entries.index')->with('success', 'Stock entry restored successfully.');
    }

    /**
     * Permanently delete a stock entry from the database.
     */
    public function forceDelete($id)
    {
        StockEntry::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('entries.index')->with('success', 'Stock entry permanently deleted.');
    }
}
