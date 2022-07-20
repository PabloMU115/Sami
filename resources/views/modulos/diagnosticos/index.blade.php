@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content')
    @livewire('diagnosticos.show-diagnosticos')
    {{-- @if (Auth::user()->active == 0)
        <script>
            window.location.href = "/admin/expedientes";
        </script>
    @endif --}}
@stop
