<x-layouts.main>
    <x-slot:title>Editar la novedad {{$novedad->titulo}}</x-slot:title>
    <h1>Editar la novedad {{$novedad->titulo}}</h1>
    <x-novedad-form :novedad="$novedad" action="{{ route('novedades.actualizar', ['id' => $novedad->novedad_id]) }}" method="POST" enctype="multipart/form-data" />
</x-layouts.main>
