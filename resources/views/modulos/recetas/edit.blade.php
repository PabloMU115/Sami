@extends('adminlte::page')

@section('title', 'Recetas')

@section('content_header')
    <form action="{{route('recetas.update',$receta)}}" method="post">
        @csrf
        @method('put')
        <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <label for="">
            Nombre del Encargado:
            <br>
        <input type="text" name="nombre_medico" value="{{old('nombre_medico', $receta->nombre_medico)}}">
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
     <textarea name="indicaciones" value="{{old('indicaciones')}}">{{$receta->indicaciones}}</textarea>
     </label>
    <br>
    @error('indicaciones')
        <small>*{{$message}}</small>
        <br>
    @enderror
<br>
        <button type="submit">Guardar</button>
    </form>
    <br>
    <form action="{{route('recetas.indexFiltrado')}}" method="GET">
        <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
        <button type="submit">Volver</button><br>
    </form><br>
    <form action="{{route('recetas.index')}}" method="GET">
        <button type="submit">Volver al inicio</button><br>
    </form>
@stop