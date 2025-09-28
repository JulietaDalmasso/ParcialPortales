<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Agencia Creativa' }}</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Agencia Creativa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav">
                    <x-nav-link route="home">Home</x-nav-link>
                    <x-nav-link route="servicios">Servicios</x-nav-link>
                    <x-nav-link route="blog">Blog</x-nav-link>
                    <x-nav-link route="contacto">Contacto</x-nav-link>
                </div>
            </div>
        </div>
    </nav>



 
    <main class="container mt-4">
        {{ $slot }}
    </main>

 
    <footer class="bg-light text-center text-muted py-3 mt-4 border-top">
    <small>&copy; {{ date('Y') }} Agencia Creativa — Todos los derechos reservados.</small>
    </footer>

</body>
</html>
