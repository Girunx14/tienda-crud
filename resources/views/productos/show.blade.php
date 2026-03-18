{{-- resources/views/productos/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">
                    <i class="bi bi-box-seam"></i> Detalle del Producto
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%" class="bg-light">ID</th>
                        <td>{{ $producto->id }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Nombre</th>
                        <td>{{ $producto->nombre }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Categoría</th>
                        <td>
                            <span class="badge bg-primary fs-6">
                                {{ $producto->categoria }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light">Cantidad</th>
                        <td>{{ $producto->cantidad }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Precio</th>
                        <td>
                            <span class="text-success fw-bold fs-5">
                                ${{ number_format($producto->precio, 2) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light">Registrado el</th>
                        <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Última actualización</th>
                        <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-footer d-flex gap-2">
                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>

    </div>
</div>
@endsection