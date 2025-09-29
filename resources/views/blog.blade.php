<x-layouts.main>
    <x-slot:title>Blog</x-slot:title>

    <div class="novedades-header">
        @auth
            <a href="{{ route('novedades.crear') }}" class="novedades-nuevo">+ Publicar novedad</a>
        @endauth
    </div>

    <div class="novedades-container">
        @foreach ($novedades as $novedad)
            <div class="novedad-card">
                <p class="novedad-id">ID: {{ $novedad->novedad_id }}</p>
                <h3>{{ $novedad->titulo }}</h3>
                <p>{{ $novedad->descripcion }}</p>

                {{-- 
                    imgs
                    <img src="{{ asset($novedad->imagen) }}" alt="{{ $novedad->imagen_descripcion }}" >
                --}}

                <div class="novedad-actions">
                    <a href="{{ route('novedades.detalle', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Ver</a>
                    @auth
                    <a href="{{ route('novedades.editar', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Editar</a>
                    <a href="{{ route('novedades.eliminar', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Eliminar</a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.main>
