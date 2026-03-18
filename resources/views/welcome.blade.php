{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-5 fw-bold">
        <i class="bi bi-shop"></i> Bienvenido a Tienda CRUD
    </h1>
    <p class="lead text-muted">
        Sistema de administración de clientes y productos
    </p>
</div>

{{-- Tarjetas de resumen --}}
<div class="row justify-content-center g-4">

    <div class="col-md-4">
        <div class="card shadow text-center border-0">
            <div class="card-body py-5">
                <i class="bi bi-people display-4 text-primary"></i>
                <h2 class="mt-3 fw-bold">{{ $totalClientes }}</h2>
                <p class="text-muted">Clientes registrados</p>
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-right"></i> Ver Clientes
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow text-center border-0">
            <div class="card-body py-5">
                <i class="bi bi-box-seam display-4 text-success"></i>
                <h2 class="mt-3 fw-bold">{{ $totalProductos }}</h2>
                <p class="text-muted">Productos registrados</p>
                <a href="{{ route('productos.index') }}" class="btn btn-success">
                    <i class="bi bi-arrow-right"></i> Ver Productos
                </a>
            </div>
        </div>
    </div>

</div>
@endsection