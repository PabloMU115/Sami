@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content_header')
<h1>Editar diagnostico: {{$diagnostico->id_diagnostico}}</h1>
<p>ID: {{$diagnostico->id_diagnostico}}</p>
<p>Nombre del Paciente: {{$diagnostico->nombre_paciente}}</p>
<p>Nombre nombre del encargado: {{$diagnostico->nombre_medico}}</p>
<p>Categoria: {{$diagnostico->categoria}}</p>
<p>Descripcion: {{$diagnostico->descripcion}}</p>
<p>Fecha en la que fue emitido el diagnostico: {{$diagnostico->fecha_emision}}</p>
<form action="{{route('diagnosticos.edit',$diagnostico)}}" method="GET">
    <button type="submit">Editar</button><br>
</form>
<form action="{{route('diagnosticos.destroy',$diagnostico)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>
<form action="{{route('diagnosticos.index')}}" method="GET">
    <button type="submit">Volver</button><br>
</form>
@stop