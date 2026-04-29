<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    if (Auth::check()) {
        $totalClientes  = \App\Models\Cliente::count();
        $totalProductos = \App\Models\Producto::count();
        $totalArchivos  = \App\Models\Archivo::count();
        return view('welcome', compact('totalClientes', 'totalProductos', 'totalArchivos'));
    }
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::get('clientes-report', [ClienteController::class, 'report'])->name('clientes.report');

    Route::resource('productos', ProductoController::class);
    Route::get('productos-report', [ProductoController::class, 'report'])->name('productos.report');

    Route::resource('archivos', ArchivoController::class);
    Route::get('archivos/{archivo}/download', [ArchivoController::class, 'download'])->name('archivos.download');
    Route::get('archivos-report', [ArchivoController::class, 'report'])->name('archivos.report');
});

Auth::routes();
