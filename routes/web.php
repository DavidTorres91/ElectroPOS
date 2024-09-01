<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FacturaProductoController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas para Clientes
Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// Rutas para Productos
Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// Rutas para las facturas
Route::get('facturas', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('facturas/create', [FacturaController::class, 'create'])->name('facturas.create');
Route::post('facturas', [FacturaController::class, 'store'])->name('facturas.store');
Route::get('facturas/{factura}', [FacturaController::class, 'show'])->name('facturas.show');
Route::get('facturas/{factura}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');
Route::put('facturas/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
Route::delete('facturas/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');

// Rutas para gestionar los productos de una factura
Route::get('facturas/{factura}/productos/create', [FacturaProductoController::class, 'create'])->name('factura_productos.create');
Route::post('facturas/{factura}/productos', [FacturaProductoController::class, 'store'])->name('factura_productos.store');
Route::delete('facturas/{factura}/productos/{producto}', [FacturaProductoController::class, 'destroy'])->name('factura_productos.destroy');
