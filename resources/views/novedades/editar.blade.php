<x-layouts.main>
    <div class="form-servicio">
        <h1> Editar la novedad <strong>{{ $novedad->titulo }}</strong></h1>
        <x-novedad-form :novedad="$novedad" :categories="$categories"
            action="{{ route('novedades.actualizar', ['id' => $novedad->novedad_id]) }}" method="POST"
            enctype="multipart/form-data" />
    </div>
</x-layouts.main>
