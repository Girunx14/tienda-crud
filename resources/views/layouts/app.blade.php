{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tienda CRUD')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .btn-action {
            margin: 0 2px;
        }
    </style>
</head>
<body>

    {{-- ===================== NAVBAR ===================== --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('clientes.index') }}">
                <i class="bi bi-shop"></i> Tienda CRUD
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('clientes*') ? 'active' : '' }}"
                           href="{{ route('clientes.index') }}">
                            <i class="bi bi-people"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('productos*') ? 'active' : '' }}"
                           href="{{ route('productos.index') }}">
                            <i class="bi bi-box-seam"></i> Productos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ===================== CONTENIDO PRINCIPAL ===================== --}}
    <div class="container mt-4">

        {{-- Mensajes flash de éxito --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Mensajes flash de error --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Contenido de cada vista hija --}}
        @yield('content')

    </div>

    {{-- ===================== FOOTER ===================== --}}
    <footer class="text-center text-muted mt-5 mb-3">
        <small>Tienda CRUD &copy; {{ date('Y') }} — Laravel 10</small>
    </footer>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>

    {{-- Scripts adicionales de cada vista --}}
    @stack('scripts')

</body>
</html>