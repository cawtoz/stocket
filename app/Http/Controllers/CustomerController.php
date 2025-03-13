<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        $customers = Customer::withoutTrashed()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required|string|max:255|unique:customers',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customers',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'document_id' => 'required|string|max:255|unique:customers,document_id,'.$customer->id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customers,email,'.$customer->id,
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Cliente eliminado exitosamente.');
    }

    /**
     * Restore a soft-deleted customer.
     */
    public function restore($id)
    {
        Customer::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('customers.index')->with('success', 'Cliente restaurado exitosamente.');
    }

    /**
     * Permanently delete a customer.
     */
    public function forceDelete($id)
    {
        Customer::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('customers.index')->with('success', 'Cliente eliminado permanentemente.');
    }

    /**
     * Display a list of soft-deleted customers.
     */
    public function trash()
    {
        $customers = Customer::onlyTrashed()->paginate(10);
        return view('customers.trash', compact('customers'));
    }
}
