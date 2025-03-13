<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        $suppliers = Supplier::withoutTrashed()->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new supplier.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created supplier in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|string|max:255|unique:suppliers',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|unique:suppliers',
            'address' => 'required|string|max:255',
        ]);

        Supplier::create($request->only(['nit', 'name', 'phone', 'email', 'address']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified supplier details.
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in the database.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nit' => 'required|string|max:255|unique:suppliers,nit,' . $supplier->id,
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|unique:suppliers,email,' . $supplier->id,
            'address' => 'required|string|max:255',
        ]);

        $supplier->update($request->only(['nit', 'name', 'phone', 'email', 'address']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    /**
     * Soft delete the specified supplier.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }

    /**
     * Restore a soft-deleted supplier.
     */
    public function restore($id)
    {
        Supplier::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('suppliers.index')->with('success', 'Supplier restored successfully.');
    }

    /**
     * Permanently delete a supplier from the database.
     */
    public function forceDelete($id)
    {
        Supplier::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier permanently deleted.');
    }

    /**
     * Display a listing of the trashed suppliers.
     */
    public function trash()
    {
        $suppliers = Supplier::onlyTrashed()->paginate(10);
        return view('suppliers.trash', compact('suppliers'));
    }
}
