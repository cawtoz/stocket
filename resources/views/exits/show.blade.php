<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Stock Exit Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main container -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Product:') }}</strong> {{ $stockExit->product->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Customer:') }}</strong> {{ optional($stockExit->customer)->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Quantity:') }}</strong> {{ $stockExit->quantity }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Document:') }}</strong> {{ $stockExit->document }}</p>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('exits.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600">
                            <!-- Back icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End main container -->
        </div>
    </div>
</x-app-layout>
