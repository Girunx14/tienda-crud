{{-- resources/views/productos/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

<div class="glass-card border-0 p-4">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-shape bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3"
                        style="width: 50px; height: 50px; background: var(--gradient-1) !important;">
                        <i class="bi bi-plus-square fs-4"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 fw-bold">Nuevo Producto</h4>
                        <small class="text-muted">Registra un nuevo artículo en el inventario</small>
                    </div>
                </div>

                <div>
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
                        <button type="submit" class="btn btn-premium">
                            <i class="bi bi-save me-2"></i> Guardar Producto
                        </button>
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-dark rounded-3 px-4">
                            <i class="bi bi-arrow-left me-2"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection