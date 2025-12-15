<x-layouts.main>
    <x-slot:title>Iniciar sesión</x-slot:title>

    <div class="login-container">
        <h1 class="login-title">Iniciar sesión</h1>
        <form method="POST" action="{{ route('auth.doLogin') }}" class="login-form">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">El formulario tiene errores y no puede ser enviado.</div>
            @endif

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger" id="error_email">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror">
                @error('password')
                    <div class="text-danger" id="error_password">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">Ingresar</button>
        </form>
    </div>
</x-layouts.main>
