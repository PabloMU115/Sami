@extends('adminlte::page')

@section('title', 'Recetas')

@section('content')
    @livewire('recetas.show-recetas')
    @if (Auth::user()->active == 0 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/actualizarPago";
        </script>
    @endif
@stop
