<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Crear Proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nit" class="block font-medium text-sm text-gray-700">{{ __('NIT') }}</label>
                            <input type="text" name="nit" id="nit" value="{{ old('nit') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-gray-400">
                            @error('nit')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Nombre') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-gray-400">
                            @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block font-medium text-sm text-gray-700">{{ __('Teléfono') }}</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-gray-400">
                            @error('phone')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-gray-400">
                            @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block font-medium text-sm text-gray-700">{{ __('Dirección') }}</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-gray-400">
                            @error('address')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zM7 17h10M7 13h10M7 9h4m6 8v-8a2 2 0 00-2-2H7" />
                                </svg>
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
