@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
<form action="{{route('recetas.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <label for="">
            Nombre del Encargado:
            <br>
        <input type="text" name="nombre_medico" value="{{old('nombre_medico')}}">
        </label>
    <br>
    @error('nombre_medico')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <label for="">
        Indicaciones:
        <br>
     <textarea name="indicaciones" rows="6" value="Ninguna">Ninguna</textarea>
     </label>
    <br>
    @error('indicaciones')
        <small>*{{$message}}</small>
        <br>
    @enderror
<br>
    <button type="submit">Guardar</button>
    </form>
    <form action="{{route('recetas.indexFiltrado',['id' => $expedientes[0]->id_expediente])}}" method="GET">
        <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
        <button type="submit">Volver</button><br>
    </form>
    <form action="{{route('recetas.index')}}" method="GET">
        <button type="submit">Volveral inicio</button><br>
    </form>
@stop