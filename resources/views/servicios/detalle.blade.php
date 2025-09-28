<x-layouts.main>
    <x-slot:title>Detalle de {{$servicio->nombre}}</x-slot:title>
    <h1>{{$servicio->title}}</h1>
    <dl>
        <dt>Nombre</dt>
        <dd>{{$servicio->nombre}}</dd>
        <dt>Precio</dt>
        <dd>{{$servicio->precio}}</dd>
    </dl>

    <h2>Detalle del servicio</h2>
    <div>{{$servicio->descripcion}}</div>
</x-layouts.main>