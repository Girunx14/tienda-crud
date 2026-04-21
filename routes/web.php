<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Models\Cliente;
use App\Models\Producto;

Route::get('/', function () {
    if (Auth::check()) {
        $totalClientes  = \App\Models\Cliente::count();
        $totalProductos = \App\Models\Producto::count();
        return view('welcome', compact('totalClientes', 'totalProductos'));
    }
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
});

Auth::routes();
