<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Agencia Creativa' }}</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
</head>
<body class="layout">
<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container d-flex justify-content-between align-items-center">

            
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Maju.</a>

            
            <div class="d-flex flex-grow-1 justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><x-nav-link route="home">Home</x-nav-link></li>
                    <li class="nav-item"><x-nav-link route="servicios">Servicios</x-nav-link></li>
                    <li class="nav-item"><x-nav-link route="blog">Blog</x-nav-link></li>
                    @auth
                    <form action="{{route('auth.doLogout')}}" method="POST" >
                        @csrf
                        <button class="nav-item" >{{auth()->user()->email}} (Cerrar Sesión) </button> 
                     </form>
                    @else
                        <li class="nav-item"><x-nav-link route="auth.showLogin">Iniciar sesión</x-nav-link></li> 
                    @endauth
                </ul>
            </div>

           
            <div>
                <a href="{{ route('contacto') }}" class="btn btn-dark rounded-pill px-4">
                    Contacto ↗
                </a>
            </div>

        </div>
    </nav>

 
    <main class="mt-4">
        @if (session()->has('feedback.message'))
            <div class="alert alert-{{session()->get('feedback.type', 'success')}} text-center">
                {{ session()->get('feedback.message') }}
            </div>
        @endif
    {{ $slot }}
    </main>

 
    <footer class="bg-light text-center text-muted py-3 mt-4 border-top">
    <small>&copy; {{ date('Y') }} Agencia Creativa *Dalmasso y Pujadas* — Todos los derechos reservados.</small>
    </footer>

</body>
</html>
