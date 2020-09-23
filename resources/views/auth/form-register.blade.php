<form class="form-login" action="{{ route('register') }}" method="POST">
    @csrf
    <h1 class="title-register">Crear Cuenta</h1>
    <input type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Nombre de Usuario" autofocus required />
    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong class="error_lr">{{ $message }}</strong>
        </span>
    @enderror

    <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required />
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong class="error_lr">{{ $message }}</strong>
        </span>
    @enderror

    <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required />
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong class="error_lr">{{ $message }}</strong>
        </span>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required />
    <button class="button-register">Registrar</button>
</form>