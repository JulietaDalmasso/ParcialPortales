<x-layouts.main>
    <x-slot:title>Publicar un nuevo blog</x-slot:title>
    <h1>Publicar un nuevo blog</h1>
    <x-novedad-form action="{{ route('novedades.store') }}" method="POST" enctype="multipart/form-data" />
</x-layouts.main>
