{{-- resources/views/productos/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="glass-card border-0 p-4">
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="icon-shape bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3"
                    style="width: 50px; height: 50px; background: var(--gradient-1) !important;">
                    <i class="bi bi-box-seam fs-4"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">Detalle del Producto</h4>
                    <small class="text-muted">Información completa del artículo</small>
                </div>
            </div>

            <div>
                <table class="table">
                    <tr>
                        <th width="30%" class="text-muted fw-semibold">ID</th>
                        <td class="fw-bold">{{ $producto->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Nombre</th>
                        <td>{{ $producto->nombre }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Categoría</th>
                        <td>
                            <span class="badge-premium" style="background: rgba(99, 102, 241, 0.1); color: #6366f1;">
                                {{ $producto->categoria }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Cantidad</th>
                        <td>{{ $producto->cantidad }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Precio Unitario</th>
                        <td>
                            <span class="fw-bold text-success">${{ number_format($producto->precio, 2) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Registrado el</th>
                        <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted fw-semibold">Última actualización</th>
                        <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 pt-3 border-top">
                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-premium">
                    <i class="bi bi-pencil me-2"></i> Editar
                </a>
                <a href="{{ route('productos.index') }}" class="btn btn-outline-dark rounded-3 px-4">
                    <i class="bi bi-arrow-left me-2"></i> Volver
                </a>
            </div>
        </div>

    </div>
</div>
@endsection