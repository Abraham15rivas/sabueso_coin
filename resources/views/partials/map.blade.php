@extends('layouts.app')

@section('content')

    <map-component class="mt-5" :check_user="{{ $check_user == 0 ? 'false' : 'true' }}"/>

@endsection