<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\StockEntry;
use App\Models\StockExit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard con información del sistema en tiempo real.
     */
    public function index()
    {
        // Estadísticas generales
        $totalProductos      = Product::count();
        $totalProveedores    = Supplier::count();
        $totalClientes       = Customer::count();
        $totalEntradasStock  = StockEntry::count();
        $totalSalidasStock   = StockExit::count();
        $totalUsuarios       = User::count();

        // Datos para el gráfico de movimientos de stock (últimos 7 días)
        $fechasGrafico   = [];
        $entradasGrafico = [];
        $salidasGrafico   = [];
        for ($i = 6; $i >= 0; $i--) {
            $fecha = Carbon::now()->subDays($i)->format('Y-m-d');
            $fechasGrafico[]   = $fecha;
            $entradasGrafico[] = StockEntry::whereDate('created_at', $fecha)->sum('quantity');
            $salidasGrafico[]   = StockExit::whereDate('created_at', $fecha)->sum('quantity');
        }

        return view('dashboard', compact(
            'totalProductos',
            'totalProveedores',
            'totalClientes',
            'totalEntradasStock',
            'totalSalidasStock',
            'totalUsuarios',
            'fechasGrafico',
            'entradasGrafico',
            'salidasGrafico'
        ));
    }

    /**
     * (Opcional) Retorna estadísticas en JSON para actualizar el dashboard vía AJAX.
     */
    public function stats()
    {
        $data = [
            'totalProductos'     => Product::count(),
            'totalProveedores'   => Supplier::count(),
            'totalClientes'      => Customer::count(),
            'totalEntradasStock' => StockEntry::count(),
            'totalSalidasStock'  => StockExit::count(),
            'totalUsuarios'      => User::count(),
        ];

        return response()->json($data);
    }
}
