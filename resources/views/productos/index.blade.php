{{-- resources/views/productos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Inventario de Productos')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h2 class="fw-bold mb-0">Inventario Pro</h2>
        <p class="text-muted small">Control total de existencias y valorización de stock.</p>
    </div>
<div class="col-md-6 text-md-end">
            <a href="{{ route('productos.report') }}" class="btn btn-outline-dark rounded-pill px-4 me-2">
                <i class="bi bi-file-earmark-pdf me-2"></i> Reporte PDF
            </a>
            <a href="{{ route('productos.create') }}" class="btn btn-premium-secondary d-inline-flex align-items-center">
                <i class="bi bi-plus-circle-fill me-2 fs-5"></i> Agregar Producto
            </a>
        </div>
</div>

<div class="glass-card border-0 p-4 mb-5">
    @if($productos->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-box-seam display-1 text-muted opacity-25"></i>
            <h5 class="text-muted mt-3">No hay productos registrados</h5>
            <a href="{{ route('productos.create') }}" class="btn btn-link">¡Registra el primero aquí!</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-center">Stock</th>
                        <th>Precio Unitario</th>
                        <th>Valor Total</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-3 p-2 me-3 text-primary">
                                    <i class="bi bi-tag-fill fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $producto->nombre }}</h6>
                                    <span class="badge bg-soft-primary px-2 py-1 small" style="font-size: 0.65rem; background: rgba(59, 130, 246, 0.1); color: #2563eb;">
                                        {{ $producto->categoria }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="fw-bold {{ $producto->cantidad < 5 ? 'text-danger' : 'text-dark' }}">
                                {{ $producto->cantidad }}
                            </span>
                            @if($producto->cantidad < 5)
                                <i class="bi bi-exclamation-triangle-fill text-warning ms-1" title="Stock bajo"></i>
                            @endif
                        </td>
                        <td>
                            <span class="fw-bold text-success">${{ number_format($producto->precio, 2) }}</span>
                        </td>
                        <td>
                            <span class="text-muted small">${{ number_format($producto->precio * $producto->cantidad, 2) }}</span>
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('productos.show', $producto) }}" class="btn btn-light btn-sm rounded-3 border" title="Ver Detalles">
                                    <i class="bi bi-eye text-primary"></i>
                                </a>
                                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-light btn-sm rounded-3 border" title="Editar">
                                    <i class="bi bi-pencil-square text-warning"></i>
                                </a>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-light btn-sm rounded-3 border" title="Eliminar">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $productos->links() }}
        </div>
    @endif
</div>
@endsection