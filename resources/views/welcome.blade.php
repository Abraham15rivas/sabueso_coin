@extends('layouts.app')

@section('content')

  <welcome-component :check_user="{{ $check_user == 0 ? 'false' : 'true' }}"/>

@endsection