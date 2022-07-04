@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
<form action="{{route('diagnosticos.store')}}" method="POST">
    <br>
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
            <input type="hidden" name="nombre_paciente" value="{{$expedientes[0]->nombre}} {{$expedientes[0]->apellidos}}">
        <label for="">
                Categoria:
                <br>
            <input type="text" name="categoria" value="{{old('categoria')}}">
            </label>
        <br>
        @error('categoria')
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
                Descripcion:
                <br>
                <textarea name="descripcion" rows="6" value="Ninguna">Ninguna</textarea>
         </label>
        <br>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <form action="{{route('diagnosticos.indexFiltrado',['id' => $expedientes[0]->id_expediente])}}" method="GET">
        <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
        <button type="submit">Volver</button><br>
    </form>
    <form action="{{route('diagnosticos.index')}}" method="GET">
        <button type="submit">Volveral inicio</button><br>
    </form>
@stop