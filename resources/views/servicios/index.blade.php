

<x-layouts.main>
    <x-slot:title>Servicios</x-slot:title>
    <div class="mb-3">
        <a href="{{ route('servicios.crear') }}">Publicar un nuevo servicio</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion corta</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>{{$servicio->servicio_id}}</td>
                    <td>{{$servicio->nombre}}</td> 
                    <td>${{$servicio->precio}}</td>
                    <td>{{$servicio->descripcion_corta}}</td>
                    <td>
                        <a href="{{route('servicios.detalle', ['id' => $servicio->servicio_id])}}" class="btn btn-primary btn-sm">Ver </a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</x-layouts.main>

