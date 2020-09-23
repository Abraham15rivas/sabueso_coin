<form class="form-login" action="{{ route('login') }}"  method="POST">
    @csrf
    <h1 class="title-login">Ingresar</h1>
    <div class="icon-login">
        <img class="img-login" src="img/icons/key.svg" alt="imagen">
    </div>
    <div class="input-container">
        <input class="@error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autofocus required/>
        
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong class="error_lr">{{ $message }}</strong>
        </span>
        @enderror

        <input class="@error('password') is-invalid @enderror" type="password" placeholder="Contraseña" name="password" required/>
        
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong class="error_lr">{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            Olvidé mi contraseña
        </a>
    @endif
    <button class="button-login" type="submit">Iniciar Sesión</button>

</form>