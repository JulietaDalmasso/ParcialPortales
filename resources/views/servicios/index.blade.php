<x-layouts.main>
    <x-slot:title>Servicios</x-slot:title>
    <div class="servicios-container">
        <h1 class="titulo-servicios text-center mb-4">Nuestros Servicios</h1>
        <div class="servicios-grid">
            @foreach ($servicios as $servicio)
                <div class="servicio-card">
                    <p><strong>ID:</strong> {{ $servicio->servicio_id }}</p>
                    <p><strong>Nombre:</strong> {{ $servicio->nombre }}</p>
                    <p><strong>Precio:</strong> ${{ $servicio->precio }}</p>
                    <p><strong>Descripción corta:</strong> {{ $servicio->descripcion_corta }}</p>
                    <p><strong>Descripción larga:</strong> {{ $servicio->descripcion }}</p>
                @auth
                    @if(auth()->user()->rol === 'user')
                        <form action="{{ route('servicios.contratar', ['id' => $servicio->servicio_id]) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-rounded">Contratar</button>
                        </form>
                    @endif
                @endauth
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.main>


