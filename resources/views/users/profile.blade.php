<x-layouts.main>
    <x-slot:title>Perfil de {{ $user->name }}</x-slot:title>

    <section class="perfil-wrapper">
        <div class="perfil-header">
            <h1><span>{{ $user->name }}</span></h1>
            <p class="perfil-email">{{ $user->email }}</p>
            <div>
                <a href="{{ route('user.edit') }}" style="color:black">Editar perfil</a>
            </div>

            @if (auth()->check() && auth()->user()->rol === 'admin' && auth()->id() !== $user->id)
                <div class="perfil-alert">
                    Estás viendo el perfil de <strong>{{ $user->name }}</strong> (como administrador).
                </div>
            @endif
        </div>

        <div class="perfil-servicios">
            <h2>Historial de compras</h2>

            @if ($user->servicios->isEmpty())
                <p class="perfil-vacio">No compró ningún servicio aún.</p>
            @else
                <ul class="perfil-servicios-lista">
                    @foreach ($user->servicios as $servicio)
                        <li class="perfil-servicio-item"
                            style="display:flex; justify-content:space-between; align-items:center; gap:1rem;">
                            <div>
                                <strong>{{ $servicio->nombre ?? ($servicio->titulo ?? 'Servicio #' . ($servicio->servicio_id ?? $servicio->id)) }}</strong>
                                @if (isset($servicio->pivot->created_at))
                                    <span>— contratado el {{ $servicio->pivot->created_at->format('d/m/Y H:i') }}</span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </section>
</x-layouts.main>
