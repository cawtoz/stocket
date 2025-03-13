<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Proveedores Eliminados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Contenedor principal -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('NIT') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Nombre') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Teléfono') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Acciones') }}</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $supplier->nit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $supplier->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $supplier->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $supplier->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-1">
                                    <a href="{{ route('suppliers.restore', $supplier->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                        <!-- Icono de restaurar (flecha curva a la izquierda) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M4 10l6-6a9 9 0 11-3 14.32" />
                                        </svg>
                                        {{ __('Restaurar') }}
                                    </a>
                                    <form action="{{ route('suppliers.forceDelete', $supplier->id) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('¿Estás seguro de eliminar permanentemente?') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            <!-- Icono de eliminar (papelera) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v2H9V4a1 1 0 011-1z"/>
                                            </svg>
                                            {{ __('Eliminar Permanentemente') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin contenedor principal -->
        </div>
    </div>
</x-app-layout>
