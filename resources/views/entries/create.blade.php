<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Crear Entrada') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main container -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('entries.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="product_id" class="block font-medium text-sm text-gray-700">{{ __('Producto') }}</label>
                            <select name="product_id" id="product_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                                <option value="">{{ __('Selecciona un producto') }}</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} ({{ $product->stock }})
                                </option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="supplier_id" class="block font-medium text-sm text-gray-700">{{ __('Proveedor') }}</label>
                            <select name="supplier_id" id="supplier_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                                <option value="">{{ __('Select a supplier') }}</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">{{ __('Cantidad') }}</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                            @error('quantity')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="document" class="block font-medium text-sm text-gray-700">{{ __('Documento') }}</label>
                            <input type="text" name="document" id="document" value="{{ old('document') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                            @error('document')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600 focus:outline-none">
                                <!-- Check icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zM7 17h10M7 13h10M7 9h4m6 8v-8a2 2 0 00-2-2H7" />
                                </svg>
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End main container -->
        </div>
    </div>
</x-app-layout>
