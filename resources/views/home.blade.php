@extends('layouts.app')

@section('content')

@if(auth()->user()->role_id == 1)
    <div class="container mtop">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-new">
                    <div class="card-header text-center"><h2>Administrar</h2></div>
                    <div class="card-body text-center">

                        <a class="btn sabueso text-white" href="{{ route('categories.index') }}">Gestionar Categorías</a>
                        <a class="btn sabueso text-white" href="{{ route('payments.index') }}">Gestionar Tipos de pagos</a>
                        <a class="btn sabueso text-white" href="{{ route('companies.index') }}">Gestionar Empresas</a>

                    </div>                      
                </div>
            </div>
        </div>
    </div>
    
    @else

        @if (!empty(auth()->user()->email_verified_at))
            <user-component :user_id="{{  json_encode(auth()->user()->id) }}" />
        @else
            @include('auth.verify')
        @endif

@endif

@endsection
