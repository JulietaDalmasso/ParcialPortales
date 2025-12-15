<x-layouts.main>
    <div class="form-servicio">
        <h1> Editar perfil</h1>
        <form action="{{ route('user.update') }}" class="form-servicio" enctype="multipart/form-data" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">El formulario contiene errores y no puede ser enviado.</div>
            @endif

            <div class="mb-3">
                <label for="name">Nombre de usuario</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                    name="name"
                    @error('name')
                aria-invalid="true"
                aria-errormessage="error_name"
            @enderror
                    value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Correo electrónico</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                    name="email"
                    @error('email')
                aria-invalid="true"
                aria-errormessage="error_email"
            @enderror
                    value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar perfil</button>
        </form>
    </div>
</x-layouts.main>
