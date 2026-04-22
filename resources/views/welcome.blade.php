{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Tienda')

@section('content')
    <div class="row pt-4">
        <div class="col-lg-8 mx-auto text-center mb-5 animate__animated animate__fadeIn">
            <h6 class="text-primary fw-bold text-uppercase mb-3" style="letter-spacing: 2px;">Bienvenido al Panel de Control
            </h6>
            <h1 class="display-4 fw-bold mb-3">Gestiona tu Tienda con <span class="text-primary italic">Elegancia</span>
            </h1>
            <p class="lead text-muted px-lg-5">
                Una solución integral y moderna para el control de clientes, productos y documentación corporativa.
            </p>
        </div>
    </div>

    <div class="row g-4 animate__animated animate__fadeInUp">
        {{-- Clientes --}}
        <div class="col-md-4">
            <div class="glass-card card h-100 p-4 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape bg-primary text-white rounded-4 d-flex align-items-center justify-content-center shadow-lg"
                            style="width: 60px; height: 60px; background: var(--gradient-1) !important;">
                            <i class="bi bi-people fs-2"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-bold">{{ $totalClientes }}</h4>
                            <small class="text-muted text-uppercase fw-semibold">Clientes</small>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3">Gestión de Clientes</h5>
                    <p class="text-muted small mb-4">Administra la base de datos de tus clientes, detalles de contacto y
                        perfiles fiscales.</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-premium w-100">
                        Ir a Clientes <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Productos --}}
        <div class="col-md-4">
            <div class="glass-card card h-100 p-4 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape bg-success text-white rounded-4 d-flex align-items-center justify-content-center shadow-lg"
                            style="width: 60px; height: 60px; background: var(--gradient-2) !important;">
                            <i class="bi bi-box-seam fs-2"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-bold">{{ $totalProductos }}</h4>
                            <small class="text-muted text-uppercase fw-semibold">Productos</small>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3">Inventario Pro</h5>
                    <p class="text-muted small mb-4">Control de stock, categorías y precios con una interfaz intuitiva y
                        reportes en tiempo real.</p>
                    <a href="{{ route('productos.index') }}" class="btn btn-premium-secondary w-100">
                        Ver Inventario <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Archivos --}}
        <div class="col-md-4">
            <div class="glass-card card h-100 p-4 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape bg-dark text-white rounded-4 d-flex align-items-center justify-content-center shadow-lg"
                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #475569 0%, #1e293b 100%) !important;">
                            <i class="bi bi-file-earmark-text fs-2"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-bold">{{ $totalArchivos }}</h4>
                            <small class="text-muted text-uppercase fw-semibold">Archivos</small>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3">Centro de Documentos</h5>
                    <p class="text-muted small mb-4">Sube, organiza y visualiza documentos técnicos y contratos de forma
                        segura.</p>
                    <a href="{{ route('archivos.index') }}" class="btn btn-dark w-100 rounded-4 py-2 fw-bold"
                        style="background: #1e293b;">
                        FileManager <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 pt-4 animate__animated animate__fadeIn">
        <div class="col-12">
            <div class="glass-card p-5 border-0 text-center"
                style="background: linear-gradient(135deg, rgba(30, 41, 59, 0.05) 0%, rgba(15, 23, 42, 0.05) 100%);">
                <h3 class="fw-bold mb-3">Acciones Rápidas</h3>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('clientes.create') }}" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="bi bi-person-plus me-2"></i> Nuevo Cliente
                    </a>
                    <a href="{{ route('productos.create') }}" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="bi bi-plus-circle me-2"></i> Agregar Producto
                    </a>
                    <a href="{{ route('archivos.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="bi bi-cloud-upload me-2"></i> Subir Documento
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection