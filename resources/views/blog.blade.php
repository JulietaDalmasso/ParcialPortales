<x-layouts.main>
    <x-slot:title>Blog</x-slot:title>

    <h1 class="titulo-novedades">Blog y Novedades</h1>

    <div class="novedades-header">
        @auth
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('novedades.crear') }}" class="novedades-nuevo">+ Publicar novedad</a>
            @endif
        @endauth
    </div>

    <form action="{{ route('blog') }}" method="GET" class="buscador-form">
        <label for="categories" class="buscador-label">Categorías</label>
        <select 
            name="categories" 
            id="categories"
            class="buscador-select"
        >
            <option value="">Todas</option>
            @foreach ($categories as $category)
                <option 
                    value="{{ $category->category_id }}"
                    @selected($category->category_id == $searchParams['categories'])
                    >{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="buscador-btn">Buscar</button>
    </form>
    

    <div class="novedades-container">
        @foreach ($novedades as $novedad)
            <div class="novedad-card">
                @php
                    $existeImagen = $novedad->imagen && \Storage::exists($novedad->imagen);
                @endphp 
        
                @if($existeImagen)
                    <img 
                        src="{{ \Storage::url($novedad->imagen) }}" 
                        alt="{{ $novedad->imagen_descripcion ?? 'Imagen de novedad' }}" 
                        class="novedad-imagen">
                @else
                    <div class="novedad-imagen-placeholder">No hay imagen disponible</div>
                @endif 

                <p class="novedad-id">ID: {{ $novedad->novedad_id }}</p>
                <h3>{{ $novedad->titulo }}</h3>
                <p>{{ $novedad->descripcion }}</p>
                <div>
                    Categorias: 
                    @forelse ($novedad->categories as $category)
                        <span class="novedad-categoria">{{ $category->name }}</span>
                    @empty
                        <i>No hay categorias asignadas</i>
                    @endforelse                    
                </div>
                <div class="novedad-actions">
                    <a href="{{ route('novedades.detalle', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Ver</a>
                    @auth
                        @if(auth()->user()->rol === 'admin')
                            <a href="{{ route('novedades.editar', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Editar</a>
                            <a href="{{ route('novedades.eliminar', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Eliminar</a>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        {{ $novedades->links('vendor.pagination.bootstrap-5') }}
    </div>
</x-layouts.main>
