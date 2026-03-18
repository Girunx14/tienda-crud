{{-- resources/views/productos/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-plus-square"></i> Nuevo Producto
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">
                            Nombre <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('nombre') is-invalid @enderror"
                               id="nombre" name="nombre"
                               value="{{ old('nombre') }}"
                               placeholder="Ej: Laptop Dell XPS">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="mb-3">
                        <label for="categoria" class="form-label fw-bold">
                            Categoría <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('categoria') is-invalid @enderror"
                               id="categoria" name="categoria"
                               value="{{ old('categoria') }}"
                               placeholder="Ej: Electrónica">
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Cantidad y Precio en la misma fila --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cantidad" class="form-label fw-bold">
                                Cantidad <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   class="form-control @error('cantidad') is-invalid @enderror"
                                   id="cantidad" name="cantidad"
                                   value="{{ old('cantidad') }}"
                                   placeholder="Ej: 50"
                                   min="0">
                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="precio" class="form-label fw-bold">
                                Precio <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number"
                                       class="form-control @error('precio') is-invalid @enderror"
                                       id="precio" name="precio"
                                       value="{{ old('precio') }}"
                                       placeholder="Ej: 999.99"
                                       min="0" step="0.01">
                                @error('precio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Botones --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Producto
                        </button>
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection