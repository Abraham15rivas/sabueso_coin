@extends('layouts.app')

@section('content')
<div class="container">
    <div class="body-login">

        <div class="container-login" id="container">
            <div class="form-container sign-up-container">
                @include('auth.form-register')
            </div>
            <div class="form-container sign-in-container">
                @include('auth.form-login')
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="title-logo">SabuesoCoin!</h1>
                        <div class="logo">
                            <img src="img/icons/dog.svg" alt="logo">
                        </div>
                        <button class="ghost" id="signIn" type="button">Entrar</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="title-logo">SabuesoCoin!</h1>
                        <div class="logo">
                            <img src="img/icons/dog.svg" alt="logo">
                        </div>
                        <button type="button" class="ghost" id="signUp">Crear Cuenta</button>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

@endsection
