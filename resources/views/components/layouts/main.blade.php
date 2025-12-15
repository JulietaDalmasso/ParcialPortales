<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Agencia Creativa' }}</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon1.png') }}">

</head>

<body class="layout">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Maju.</a>
            <div class="d-flex grow justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><x-nav-link route="home">Home</x-nav-link></li>
                    <li class="nav-item"><x-nav-link route="servicios">Servicios</x-nav-link></li>
                    <li class="nav-item"><x-nav-link route="blog">Blog</x-nav-link></li>
                    @auth
                        @if (auth()->user()->rol === 'user')
                            <li class="nav-item"><x-nav-link route="user.profile">Mi perfil</x-nav-link></li>
                        @elseif(auth()->user()->rol === 'admin')
                            <li class="nav-item"><x-nav-link route="admin">Contrataciones</x-nav-link></li>
                        @endif

                        <form action="{{ route('auth.doLogout') }}" method="POST"
                            class="logout-form ms-3 d-flex align-items-center">
                            @csrf
                            <span class="user-email me-2">{{ auth()->user()->email }}</span>
                            <button type="submit" class="logout-link">Cerrar sesión</button>
                        </form>
                        <li class="nav-item"><x-nav-link route="mp.test">Mi Carrito</x-nav-link></li>
                    @else
                        <li class="nav-item"><x-nav-link route="auth.showLogin">Iniciar sesión</x-nav-link></li>
                        <li class="nav-item"><x-nav-link route="auth.showRegister">Registrarme</x-nav-link></li>
                    @endauth
                </ul>
            </div>
            <div>
                <a href="https://github.com/JulietaDalmasso/ParcialPortales" class="btn btn-dark rounded-pill px-4"
                    target="_blank">
                    Portfolio ↗
                </a>
            </div>
        </div>
    </nav>
    <main class="mt-4">
        @if (session()->has('feedback.message'))
            <div class="alert alert-{{ session()->get('feedback.type', 'success') }} text-center">
                {{ session()->get('feedback.message') }}
            </div>
        @endif
        {{ $slot }}
    </main>
    <footer class="bg-light text-center text-muted py-3 mt-4 border-top">
        <small>&copy; {{ date('Y') }} Agencia Creativa - Dalmasso y Pujadas — Todos los derechos
            reservados.</small>
    </footer>
</body>

</html>
