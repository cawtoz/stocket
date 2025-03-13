<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Trashed Stock Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main container -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Product') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Supplier') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Quantity') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Document') }}</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @foreach($entries as $entry)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry->supplier->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $entry->document }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-1">
                                    <a href="{{ route('entries.restore', $entry->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                        <!-- Restore icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M4 10l6-6a9 9 0 11-3 14.32"/>
                                        </svg>
                                        {{ __('Restore') }}
                                    </a>
                                    <form action="{{ route('entries.forceDelete', $entry->id) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to permanently delete this entry?') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            <!-- Delete icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v2H9V4a1 1 0 011-1z"/>
                                            </svg>
                                            {{ __('Delete Permanently') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $entries->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End main container -->
        </div>
    </div>
</x-app-layout>
