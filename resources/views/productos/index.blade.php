{{-- resources/views/productos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-box-seam"></i> Productos</h2>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nuevo Producto
    </a>
</div>

{{-- Tabla de productos --}}
@if($productos->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> No hay productos registrados aún.
        <a href="{{ route('productos.create') }}">¡Registra el primero!</a>
    </div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>
                        <span class="badge bg-primary">
                            {{ $producto->categoria }}
                        </span>
                    </td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>
                        <span class="text-success fw-bold">
                            ${{ number_format($producto->precio, 2) }}
                        </span>
                    </td>
                    <td class="text-center">
                        {{-- Ver --}}
                        <a href="{{ route('productos.show', $producto) }}"
                           class="btn btn-sm btn-info btn-action" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>

                        {{-- Editar --}}
                        <a href="{{ route('productos.edit', $producto) }}"
                           class="btn btn-sm btn-warning btn-action" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>

                        {{-- Eliminar --}}
                        <form action="{{ route('productos.destroy', $producto) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirmarEliminar(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger btn-action"
                                    title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $productos->links() }}
    </div>
@endif
@endsection

@push('scripts')
<script>
    function confirmarEliminar(e) {
        e.preventDefault();
        if (confirm('¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.')) {
            e.target.submit();
        }
        return false;
    }
</script>
@endpush