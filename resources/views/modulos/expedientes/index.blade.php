@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
    @livewire('expedientes.show-expedientes')
    @if (Auth::user()->active == 0 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/actualizarPago";
        </script>
    @endif
@stop
