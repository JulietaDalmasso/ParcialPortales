<x-layouts.main>
    <x-slot:title>Prueba de integración con Mercado Pago</x-slot:title>

    <section class="perfil-wrapper">
        <div class="perfil-servicios">
            <h1>Confirmar compra</h1>
            <p>Corroborá que los datos sean correctos antes de finalizar tu compra. </p>

            @if($user->servicios->isEmpty())
                <p class="perfil-vacio">No contrató servicios aún.</p>
            @else
                <ul class="perfil-servicios-lista">
                    @foreach($user->servicios as $servicio)
                        <li class="perfil-servicio-item" style="display:flex; justify-content:space-between; align-items:center; gap:1rem;">
                            <div>
                                <strong>{{ $servicio->nombre ?? $servicio->titulo ?? 'Servicio #' . ($servicio->servicio_id ?? $servicio->id) }}</strong>
                                <strong style="color: black">— ${{ $servicio->precio }}</strong>
                            </div>
                            <div>
                                <form action="{{ route('servicios.cancelar', $servicio->servicio_id) }}" method="POST" >
                                    @csrf
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>  
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="btn-pagar">
                    Total a pagar: <strong>${{ $user->servicios->sum('precio') }}</strong>
                </div>
            @endif
        </div>

        {{-- boton de pago --}}
        <div id="payment_button">

        </div>
    </section>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('<?= $MPPublicKey;?>');

        mp.bricks().create('wallet', 'payment_button', {
            initialization : {
                preferenceId : '<?= $preference->id; ?>',
            }
        });
    </script>
</x-layouts.main>