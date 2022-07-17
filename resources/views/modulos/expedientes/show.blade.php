@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
@if ($expediente->id_tenant == Auth::id())
    <p>ID: {{$expediente->id_expediente}}</p>
    <p>Cedula: {{$expediente->cedula}}</p>
    <p>Nombre: {{$expediente->nombre}}</p>
    <p>Apellidos: {{$expediente->apellidos}}</p>
    <p>Edad: {{$expediente->edad}}</p>
    <p>Genero: {{$expediente->genero}}</p>
    <p>Alergias: {{$expediente->alergias}}</p>
    <p>Tipo Sangre: {{$expediente->tipo_sangre}}</p>
    @else
    {{view('admin.index');}}
@endif
@stop