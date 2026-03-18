<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Models\Cliente;
use App\Models\Producto;

Route::get('/', function () {
    $totalClientes  = Cliente::count();
    $totalProductos = Producto::count();

    return view('welcome', compact('totalClientes', 'totalProductos'));
});

Route::resource('clientes', ClienteController::class);
Route::resource('productos', ProductoController::class);