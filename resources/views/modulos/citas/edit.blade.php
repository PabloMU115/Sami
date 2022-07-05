@extends('adminlte::page')

@section('title', 'Citas')

@section('content')
@if ($cita->id_tenant == Auth::id())
<form action="{{route('citas.update',$cita)}}" method="post">
    <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    @csrf
    @method('put')
    <label for="">
            Nombre del Encargado:
            <br>
        <input type="text" name="nombre_medico" value="{{old('nombre_medico',$cita->nombre_medico)}}">
        </label>
    <br>
    @error('nombre_medico')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <input type="date" name="fecha" value="{{old('nombre_medico',$cita->fecha)}}" min="{{date('y/m/d')}}" max="2050-12-31">
<br>
@error('fecha')
        <small>*{{$message}}</small>
        <br>
    @enderror
<br>
    <br>
    <button type="submit">Guardar</button>
</form>
<br>
<form action="{{route('citas.indexFiltrado')}}" method="GET">
    <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <button type="submit">Volver</button><br>
</form><br>
<form action="{{route('citas.index')}}" method="GET">
    <button type="submit">Volver al inicio</button><br>
</form>
@else
{{view('admin.index');}}
@endif
@stop