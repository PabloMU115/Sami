@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
@if ($expediente->id_tenant == Auth::id())
<h1>Editar expediente: {{$expediente->id_expediente}}</h1>
    <p>ID: {{$expediente->id_expediente}}</p>
    <p>Cedula: {{$expediente->cedula}}</p>
    <p>Nombre: {{$expediente->nombre}}</p>
    <p>Apellidos: {{$expediente->apellidos}}</p>
    <p>Edad: {{$expediente->edad}}</p>
    <p>Genero: {{$expediente->genero}}</p>
    <p>Alergias: {{$expediente->alergias}}</p>
    <p>Tipo Sangre: {{$expediente->tipo_sangre}}</p>
    <form action="{{route('expedientes.edit',$expediente)}}" method="GET">
        <button type="submit">Editar</button><br>
    </form>
    <form action="{{route('expedientes.destroy',$expediente)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
    <form action="{{route('expedientes.index')}}" method="GET">
        <button type="submit">Volver</button><br>
    </form>
    @else
    {{view('admin.index');}}
@endif
@stop