@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
<form action="{{route('citas.store')}}" method="POST">
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
        <br>
        <input type="date" name="fecha" value="{{date('y/m/d')}}" min="{{date('y/m/d')}}" max="2050-12-31">
        <br>
        @error('fecha')
                <small>*{{$message}}</small>
                <br>
            @enderror
        <br>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <form action="{{route('citas.indexFiltrado',['id' => $expedientes[0]->id_expediente])}}" method="GET">
        <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
        <button type="submit">Volver</button><br>
    </form>
    <form action="{{route('citas.index')}}" method="GET">
        <button type="submit">Volveral inicio</button><br>
    </form>
@stop