@extends('adminlte::page')

@section('title', 'Citas')

@section('content')
@if (sizeof($expedientes) > 0)
        <label for="id_expediente">Seleccione el Expediente que desea gestionar:</label>
        @livewire('citas.show-citas')
    @else
        <br>No se encuentran Expedientes registrados...
    @endif
@stop