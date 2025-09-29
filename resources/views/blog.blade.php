
<x-layouts.main>
    <x-slot:title>Blog</x-slot:title>

    <div class="novedades-container">
        @auth
        <a href="{{ route('novedades.crear') }}" class="novedades-nuevo">+ Publicar un nuevo novedad</a>
        @endauth
        <table class="novedades-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripción corta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($novedades as $novedad)
                    <tr>
                        <td>{{ $novedad->novedad_id }}</td>
                        <td>{{ $novedad->titulo }}</td> 
                        <td>{{ $novedad->descripcion }}</td>
                        <td>
                            <a href="{{ route('novedades.detalle', ['id' => $novedad->novedad_id]) }}" class="btn-rounded">Ver</a>
                            @auth
                            <a href="{{route('novedades.editar', ['id' => $novedad->novedad_id])}}" class="btn-rounded">Editar</a>
                            <a href="{{route('novedades.eliminar', ['id' => $novedad->novedad_id])}}" class="btn-rounded">Eliminar</a>
                            @endauth
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.main>

