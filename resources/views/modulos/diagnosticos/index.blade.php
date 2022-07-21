@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content')
    @livewire('diagnosticos.show-diagnosticos')
    @if (Auth::user()->active == 0 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/actualizarPago";
        </script>
    @endif
@stop
