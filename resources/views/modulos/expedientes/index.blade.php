@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
        @if (sizeof($expedientes) > 0)
        @livewire('expedientes.show-expedientes')
        @else
            <br>No se encuentran Expedientes registrados...
        @endif
@stop
