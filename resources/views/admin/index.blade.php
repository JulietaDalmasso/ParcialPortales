<?php
$sinCompras = $users->filter(fn($u) => $u->servicios->isEmpty());
$conCompras = $users->filter(fn($u) => $u->servicios->isNotEmpty());
?>

<x-layouts.main>
    <x-slot:title>Panel de Admin</x-slot:title>

    <div class="admin-panel">
        <h1 class="crear-titulo">Panel de Administración</h1>

        <p>Usuarios y contrataciones</p>

        <div class="admin-columns">
            <div class="">
                <h2>Usuarios sin compras</h2>

                @if($sinCompras->isEmpty())
                    <p class="empty-note">No hay usuarios sin compras.</p>
                @else
                    @foreach($sinCompras as $user)
                        <a href="{{ auth()->check() && auth()->id() === $user->id ? route('user.profile') : route('user.show', $user->id) }}" class="card mb-4 p-3 card-link" style="display:block; text-decoration:none; color:inherit;">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>{{ $user->name }}</strong>
                                    <div class="text-muted">{{ $user->email }}</div>
                                </div>
                                <div>
                                    <small class="text-muted">0 contrataciones</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

            <div class="">
                <h2>Usuarios con compras</h2>
                @if($conCompras->isEmpty())
                    <p class="empty-note">No hay contrataciones aún.</p>
                @else
                    @foreach($conCompras as $user)
                        <div class="card mb-4 p-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ auth()->check() && auth()->id() === $user->id ? route('user.profile') : route('user.show', $user->id) }}" class="stretched-link text-decoration-none">
                                        <strong>{{ $user->name }}</strong>
                                    </a>
                                    <div class="text-muted">{{ $user->email }}</div>
                                </div>
                                <div>
                                    <small>
                                        Contrataciones: {{ $user->servicios->count() }}
                                    </small>
                                </div>
                            </div>

                            <ul class="servicio-list">
                                @foreach($user->servicios as $servicio)
                                    <li>
                                        <strong>{{ $servicio->nombre ?? $servicio->titulo ?? 'Servicio #' . ($servicio->servicio_id ?? $servicio->id) }}</strong>
                                        <span class="text-muted"> - ${{ $servicio->precio }}</span> 
                                        @if(isset($servicio->pivot->created_at))
                                            — contratado el {{ $servicio->pivot->created_at->format('d/m/Y H:i') }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layouts.main>
