<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockEntryController;
use App\Http\Controllers\StockExitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard.stats');

    Route::get('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::resource('users', UserController::class);

    Route::get('customers/{id}/restore', [CustomerController::class, 'restore'])->name('customers.restore');
    Route::delete('customers/{id}/force-delete', [CustomerController::class, 'forceDelete'])->name('customers.forceDelete');
    Route::get('customers/trash', [CustomerController::class, 'trash'])->name('customers.trash');
    Route::resource('customers', CustomerController::class);

    Route::get('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::resource('products', ProductController::class);

    Route::get('suppliers/{id}/restore', [SupplierController::class, 'restore'])->name('suppliers.restore');
    Route::delete('suppliers/{id}/force-delete', [SupplierController::class, 'forceDelete'])->name('suppliers.forceDelete');
    Route::get('suppliers/trash', [SupplierController::class, 'trash'])->name('suppliers.trash');
    Route::resource('suppliers', SupplierController::class);

    Route::get('entries/{id}/restore', [StockEntryController::class, 'restore'])->name('entries.restore');
    Route::delete('entries/{id}/force-delete', [StockEntryController::class, 'forceDelete'])->name('entries.forceDelete');
    Route::get('entries/trash', [StockEntryController::class, 'trash'])->name('entries.trash');
    Route::resource('entries', StockEntryController::class);

    Route::get('exits/{id}/restore', [StockExitController::class, 'restore'])->name('exits.restore');
    Route::delete('exits/{id}/force-delete', [StockExitController::class, 'forceDelete'])->name('exits.forceDelete');
    Route::get('exits/trash', [StockExitController::class, 'trash'])->name('exits.trash');
    Route::resource('exits', StockExitController::class);

});
