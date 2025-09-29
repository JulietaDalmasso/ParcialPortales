<x-layouts.main>
    <x-slot:title>Blog '{{ $novedad->titulo }}'</x-slot:title>

    <div class="detalle-container">
        <h1 class="detalle-titulo">{{ $novedad->titulo }}</h1>
        
        <div class="detalle-info">
            <p><strong>Contenido:</strong> {{ $novedad->contenido }}</p>
            {{-- <p><strong>Descripción:</strong> {{ $novedad->descripcion }}</p> --}}
        </div>

        <a href="{{ route('blog') }}" class="btn-rounded">← Volver</a>

        
    </div>
</x-layouts.main>
