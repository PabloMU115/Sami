@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content')
    @if (sizeof($expedientes) > 0)
        <label for="id_expediente">Seleccione el Expediente que desea gestionar:</label>
        @livewire('diagnosticos.show-diagnosticos')
    @else
        <br>No se encuentran Expedientes registrados...
    @endif
@stop
