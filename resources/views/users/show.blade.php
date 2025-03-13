<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Detalle del Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Contenedor principal -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Nombre:') }}</strong> {{ $user->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Email:') }}</strong> {{ $user->email }}</p>
                    </div>

                    <!-- Mostrar Roles -->
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Roles:') }}</strong></p>
                        <ul class="list-disc list-inside">
                            @foreach($user->roles as $role)
                            <li class="text-blue-600 font-semibold">{{ $role->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Mostrar Permisos -->
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>{{ __('Permisos:') }}</strong></p>
                        <ul class="list-disc list-inside">
                            @foreach($user->permissions as $permission)
                            <li class="text-green-600">{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600">
                            <!-- Icono de editar (lápiz) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.125 2.125 0 013.006 3.006L7.5 18.862l-4.5 1.5 1.5-4.5L16.862 3.487z" />
                            </svg>
                            {{ __('Editar') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- Fin contenedor principal -->
        </div>
    </div>
</x-app-layout>
