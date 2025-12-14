<x-layouts.main>
    <x-slot:title>Blog '{{ $novedad->titulo }}'</x-slot:title>
    <div class="detalle-container">
        <div>
            @if($novedad->imagen && \Storage::exists($novedad->imagen))
            <img src="{{ \Storage::url($novedad->imagen) }}" alt="{{ $novedad->imagen_descripcion }}" >
            @else
            No hay imagen disponible
            @endif
        </div>
        <h1 class="detalle-titulo">{{ $novedad->titulo }}</h1>
        <div class="detalle-info">
            <p>{{ $novedad->contenido }}</p>
        </div>
        <div>
            Categorias: 
            @forelse ($novedad->categories as $category)
                <span class="novedad-categoria">{{ $category->name }}</span>
            @empty
                <i>No hay categorias asignadas</i>
            @endforelse   
        </div>
        <a href="{{ route('blog') }}" class="btn-rounded">← Volver</a>  
    </div>
</x-layouts.main>
