{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Tienda CRUD')) | Premium Management</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        :root {
            --primary-color: #1e293b;
            --primary-hover: #0f172a;
            --secondary-color: #334155;
            --bg-glass: rgba(255, 255, 255, 0.7);
            --border-glass: rgba(255, 255, 255, 0.3);
            --gradient-1: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            --gradient-2: linear-gradient(135deg, #334155 0%, #1e293b 100%);
            --surface-color: #ffffff;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
            background-image:
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(236, 72, 153, 0.05) 0px, transparent 50%);
            min-height: 100vh;
            color: #1e293b;
            overflow-x: hidden;
        }

        /* Glassmorphism Classes */
        .glass-card {
            background: var(--bg-glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 48px 0 rgba(31, 38, 135, 0.12);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .nav-link {
            font-weight: 500;
            color: #64748b !important;
            padding: 0.5rem 1.2rem !important;
            border-radius: 12px;
            transition: all 0.3s ease;
            margin: 0 0.2rem;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(99, 102, 241, 0.08);
            color: var(--primary-color) !important;
        }

        .btn-premium,
        .btn-premium-secondary {
            background: var(--gradient-1);
            border: none;
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-premium:hover,
        .btn-premium-secondary:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            color: white;
        }

        /* Override Bootstrap defaults to ensure everything is black */
        .btn-primary,
        .btn-success,
        .btn-warning,
        .btn-info {
            background-color: #1e293b !important;
            border-color: #1e293b !important;
            color: white !important;
        }

        .btn-primary:hover,
        .btn-success:hover,
        .btn-warning:hover,
        .btn-info:hover {
            background-color: #0f172a !important;
            border-color: #0f172a !important;
        }

        .btn-action {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .table-container {
            border-radius: 20px;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #f1f5f9;
            padding: 1.2rem;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 1.2rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .badge-premium {
            padding: 0.5em 1em;
            border-radius: 8px;
            font-weight: 600;
        }

        footer {
            margin-top: 5rem;
            padding-bottom: 2rem;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
    @stack('css')
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand animate__animated animate__fadeIn" href="{{ url('/') }}">
                <i class="me-2"></i>TIENDA<span class="fw-light">CRUD</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="bi bi-list fs-2"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                @auth
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('clientes*') ? 'active' : '' }}"
                                href="{{ route('clientes.index') }}">
                                <i class="bi bi-people me-1"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('productos*') ? 'active' : '' }}"
                                href="{{ route('productos.index') }}">
                                <i class="bi bi-box-seam me-1"></i> Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('archivos*') ? 'active' : '' }}"
                                href="{{ route('archivos.index') }}">
                                <i class="bi bi-file-earmark-arrow-up me-1"></i> Archivos
                            </a>
                        </li>
                    </ul>
                @endauth

                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item ms-lg-2">
                                <a class="btn btn-premium" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <div class="avatar-sm me-2 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 32px; height: 32px; font-size: 0.8rem;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-2"
                                style="border-radius: 15px; min-width: 200px;">
                                <div class="px-3 py-2 border-bottom mb-2">
                                    <small class="text-muted d-block">Signed in as</small>
                                    <span class="fw-bold">{{ Auth::user()->email }}</span>
                                </div>
                                <a class="dropdown-item rounded-3 py-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2 text-danger"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm animate__animated animate__fadeInDown" role="alert"
                style="border-radius: 15px; background: #ecfdf5; color: #065f46;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm animate__animated animate__bounceIn" role="alert"
                style="border-radius: 15px; background: #fef2f2; color: #991b1b;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <div>{{ session('error') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center text-muted">
        <div class="container">
            <hr class="mb-4 opacity-5">
            <p class="mb-0 small fw-bold text-uppercase letter-spacing-1">
                Programacion Web &bull; Gerardo Segura Navarro &bull; {{ date('Y') }}
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>