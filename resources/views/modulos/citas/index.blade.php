@extends('adminlte::page')

@section('title', 'Citas')

@section('content')
    @livewire('citas.show-citas')
    @if (Auth::user()->active == 0 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/actualizarPago";
        </script>
    @endif
@stop
