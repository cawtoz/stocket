<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Tarjetas de resumen -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total de Productos -->
                <div class="p-6 bg-white rounded-lg shadow-xl flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <!-- Icono: Cube -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>

                    </div>
                    <div>
                        <p class="text-2xl font-bold">{{ $totalProductos }}</p>
                        <p class="text-gray-600">{{ __('Total de Productos') }}</p>
                    </div>
                </div>

                <!-- Total de Proveedores -->
                <div class="p-6 bg-white rounded-lg shadow-xl flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <!-- Icono: Building Office -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>

                    </div>
                    <div>
                        <p class="text-2xl font-bold">{{ $totalProveedores }}</p>
                        <p class="text-gray-600">{{ __('Total de Proveedores') }}</p>
                    </div>
                </div>

                <!-- Total de Clientes -->
                <div class="p-6 bg-white rounded-lg shadow-xl flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <!-- Icono: Usuarios -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold">{{ $totalClientes }}</p>
                        <p class="text-gray-600">{{ __('Total de Clientes') }}</p>
                    </div>
                </div>

                <!-- Total de Entradas de Stock -->
                <div class="p-6 bg-white rounded-lg shadow-xl flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <!-- Icono: Flecha Hacia Abajo -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>

                    </div>
                    <div>
                        <p class="text-2xl font-bold">{{ $totalEntradasStock }}</p>
                        <p class="text-gray-600">{{ __('Entradas de Stock') }}</p>
                    </div>
                </div>

                <!-- Total de Salidas de Stock -->
                <div class="p-6 bg-white rounded-lg shadow-xl flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <!-- Icono: Flecha Hacia Arriba -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>

                    </div>
                    <div>
                        <p class="text-2xl font-bold">{{ $totalSalidasStock }}</p>
                        <p class="text-gray-600">{{ __('Salidas de Stock') }}</p>
                    </div>
                </div>

                <!-- Total de Usuarios -->
                <div class="p-6 bg-white rounded-lg shadow-xl flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <!-- Icono: Usuario -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>


                    </div>
                    <div>
                        <p class="text-2xl font-bold">{{ $totalUsuarios }}</p>
                        <p class="text-gray-600">{{ __('Total de Usuarios') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Gráficos con nuevo layout -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Columna Izquierda: Dos Gráficos en filas -->
                <div class="grid grid-rows-2 gap-6">
                    <!-- Gráfico de Línea: Movimientos de Stock -->
                    <div class="bg-white p-6 rounded-lg shadow-xl">
                        <h3 class="text-xl font-bold mb-4">{{ __('Movimientos de Stock (Últimos 7 Días)') }}</h3>
                        <canvas id="graficoMovimientos" width="400" height="200"></canvas>
                    </div>
                    <!-- Gráfico de Barras Apiladas: Entradas y Salidas Acumuladas -->
                    <div class="bg-white p-6 rounded-lg shadow-xl">
                        <h3 class="text-xl font-bold mb-4">{{ __('Movimientos Apilados de Stock (Últimos 7 Días)') }}</h3>
                        <canvas id="graficoApilado" width="400" height="200"></canvas>
                    </div>
                </div>
                <!-- Columna Derecha: Gráfico de Pastel: Distribución de Entidades -->
                <div class="bg-white p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-bold mb-4">{{ __('Distribución de Entidades') }}</h3>
                    <canvas id="graficoDistribucion" width="400" height="430"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir Chart.js desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script para inicializar los gráficos -->
    <script>
        // Datos enviados desde el controlador
        const fechas   = @json($fechasGrafico);
        const entradas = @json($entradasGrafico);
        const salidas  = @json($salidasGrafico);

        // Gráfico de Línea: Movimientos de Stock
        const ctxLine = document.getElementById('graficoMovimientos').getContext('2d');
        const graficoMovimientos = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [
                    {
                        label: 'Entradas de Stock',
                        data: entradas,
                        borderColor: 'rgba(99, 102, 241, 1)',
                        backgroundColor: 'rgba(99, 102, 241, 0.2)',
                        fill: true,
                        tension: 0.3,
                    },
                    {
                        label: 'Salidas de Stock',
                        data: salidas,
                        borderColor: 'rgba(239, 68, 68, 1)',
                        backgroundColor: 'rgba(239, 68, 68, 0.2)',
                        fill: true,
                        tension: 0.3,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'top' } },
                scales: {
                    x: { title: { display: true, text: 'Fecha' } },
                    y: { title: { display: true, text: 'Cantidad' }, beginAtZero: true }
                }
            }
        });

        // Gráfico de Barras Apiladas: Movimientos Acumulados
        const ctxStacked = document.getElementById('graficoApilado').getContext('2d');
        const graficoApilado = new Chart(ctxStacked, {
            type: 'bar',
            data: {
                labels: fechas,
                datasets: [
                    {
                        label: 'Entradas de Stock',
                        data: entradas,
                        backgroundColor: 'rgba(99, 102, 241, 0.7)',
                        stack: 'stack1',
                    },
                    {
                        label: 'Salidas de Stock',
                        data: salidas,
                        backgroundColor: 'rgba(239, 68, 68, 0.7)',
                        stack: 'stack1',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'top' } },
                scales: {
                    x: { stacked: true, title: { display: true, text: 'Fecha' } },
                    y: { stacked: true, title: { display: true, text: 'Cantidad' }, beginAtZero: true }
                }
            }
        });

        // Gráfico de Pastel: Distribución de Entidades
        const ctxPie = document.getElementById('graficoDistribucion').getContext('2d');
        const graficoDistribucion = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Productos', 'Proveedores', 'Clientes', 'Usuarios'],
                datasets: [{
                    data: [
                        {{ $totalProductos }},
                    {{ $totalProveedores }},
        {{ $totalClientes }},
        {{ $totalUsuarios }}
        ],
        backgroundColor: [
            'rgba(99, 102, 241, 0.7)',
            'rgba(16, 185, 129, 0.7)',
            'rgba(139, 92, 246, 0.7)',
            'rgba(245, 158, 11, 0.7)'
        ],
            hoverOffset: 4
        }]
        },
        options: {
            responsive: true,
                plugins: { legend: { position: 'bottom' } }
        }
        });
    </script>
</x-app-layout>
