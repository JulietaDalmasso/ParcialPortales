<x-layouts.main>
    <x-slot:title>Servicios</x-slot:title>

    <div class="servicios-container">
       {{--  <a href="{{ route('servicios.crear') }}" class="servicios-nuevo">+ Publicar un nuevo servicio</a> --}}

        <table class="servicios-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción corta</th>
                    {{-- <th>Detalle</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->servicio_id }}</td>
                        <td>{{ $servicio->nombre }}</td> 
                        <td>${{ $servicio->precio }}</td>
                        <td>{{ $servicio->descripcion_corta }}</td>
                        {{-- <td>
                            <a href="{{ route('servicios.detalle', ['id' => $servicio->servicio_id]) }}" class="btn-rounded">Ver</a> --}}
                            {{-- <a href="{{route('servicios.editar', ['id' => $servicio->servicio_id])}}" class="btn-rounded">Editar</a>
                            <a href="{{route('servicios.eliminar', ['id' => $servicio->servicio_id])}}" class="btn-rounded">Eliminar</a> 
                        </td>--}}
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.main>
