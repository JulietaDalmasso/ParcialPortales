<x-layouts.main>
    <x-slot:title>Eliminar novedad: {{ $novedad->titulo }}</x-slot:title>
    <div class="delete-novedad">
        <h1 class="delete-titulo">Confirmación para eliminar la novedad</h1>
        <p>Estás por eliminar la siguiente novedad. Si estás seguro, podés continuar:</p>

        <div class="delete-info">
            <p><strong>Título:</strong> {{ $novedad->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $novedad->descripcion }}</p>
        </div>
        <div class="delete-actions">
            <a href="{{ route('blog') }}" class="btn-rounded">← Volver</a>

            <form action="{{ route('novedades.destruir', ['id' => $novedad->novedad_id]) }}" method="post">
                @csrf
                <button type="submit" class="btn-delete">Eliminar</button>
            </form>
        </div>
    </div>
</x-layouts.main>
