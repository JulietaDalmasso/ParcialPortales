<x-layouts.main>
    <x-slot:title>Servicios</x-slot:title>

    <div class="servicios-container">
       {{--  <a href="{{ route('servicios.crear') }}" class="servicios-nuevo">+ Publicar un nuevo servicio</a> --}}

        <div class="servicios-grid">
            @foreach ($servicios as $servicio)
                <div class="servicio-card">
                    <p><strong>ID:</strong> {{ $servicio->servicio_id }}</p>
                    <p><strong>Nombre:</strong> {{ $servicio->nombre }}</p>
                    <p><strong>Precio:</strong> ${{ $servicio->precio }}</p>
                    <p><strong>Descripción corta:</strong> {{ $servicio->descripcion_corta }}</p>
                    <p><strong>Descripción larga:</strong> {{ $servicio->descripcion }}</p>
                    
                    {{-- <a href="{{ route('servicios.detalle', ['id' => $servicio->servicio_id]) }}" class="btn-rounded">Ver</a> --}}
                    {{-- <a href="{{route('servicios.editar', ['id' => $servicio->servicio_id])}}" class="btn-rounded">Editar</a>
                    <a href="{{route('servicios.eliminar', ['id' => $servicio->servicio_id])}}" class="btn-rounded">Eliminar</a> --}}
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.main>


