

<x-layouts.main>
    <x-slot:title>Confirmación para eliminar {{ $novedad->titulo }}</x-slot:title>

    <div class="detalle-container">
        <h1 class="detalle-titulo">Confirmación para eliminar el novedad {{ $novedad->titulo }}</h1>
        <p>Estas por eliminar el siguiente novedad. Si estás seguro, podes continuar. </p>
        <div class="detalle-info">
            <p><strong>Título del novedad:</strong> {{ $novedad->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $novedad->descripcion }}</p>
        </div>

        <a href="{{ route('blog') }}" class="btn-rounded">← Volver</a>

        <form action="{{route('novedades.destruir', ['id' => $novedad->novedad_id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar {{ $novedad->titulo}}</button>
        </form>

        
    </div>
</x-layouts.main>
