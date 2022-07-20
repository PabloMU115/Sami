@extends('adminlte::page')

@section('title', 'Recetas')

@section('content')
    @livewire('recetas.show-recetas')
    @if (Auth::user()->active == 0)
        <script>
            window.location.href = "/admin/expedientes";
        </script>
    @endif
@stop
