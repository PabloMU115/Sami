@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
    @livewire('expedientes.show-expedientes')
    {{-- @if (Auth::user()->active == 0)
        <script>
            window.location.href = "admin/expedientes";
        </script>
    @endif --}}
@stop
