@extends('adminlte::page')

@section('title', 'Agenda')

@section('content')
    @livewire('agenda.show-agenda')
    @if (Auth::user()->active == 0 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/actualizarPago";
        </script>
    @endif
@stop
