@extends('adminlte::page')

@section('title', 'Citas')

@section('content')
    @livewire('citas.show-citas')
    {{-- @if (Auth::user()->active == 0)
        <script>
            window.location.href = "/admin/expedientes";
        </script>
    @endif --}}
@stop
