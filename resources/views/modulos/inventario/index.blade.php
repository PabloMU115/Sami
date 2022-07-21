@extends('adminlte::page')

@section('title', 'Inventario')

@section('content')
@livewire('inventario.show-inventario')
@if (Auth::user()->active == 0 && Auth::user()->type == 1)
    <script>
        window.location.href = "/admin/actualizarPago";
    </script>
@endif
@stop