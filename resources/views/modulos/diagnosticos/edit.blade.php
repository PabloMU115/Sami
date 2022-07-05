@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content_header')
@if ($diagnostico->id_tenant == Auth::id())
<form action="{{route('diagnosticos.update',$diagnostico)}}" method="post">
    @csrf
    @method('put')
    <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <label for="">
        Nombre del Encargado:
        <br>
     <input type="text" name="nombre_medico" value="{{old('nombre_medico', $diagnostico->nombre_medico)}}">
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
        <input type="text" name="categoria" value="{{old('categoria', $diagnostico->categoria)}}">
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
            <textarea name="descripcion" rows="6" value="{{old('descripcion', $diagnostico->descripcion)}}">Ninguna</textarea>
     </label>
    <br>
    <br>
    <button type="submit">Guardar</button>
</form>
<br>
<form action="{{route('diagnosticos.indexFiltrado')}}" method="GET">
    <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <button type="submit">Volver</button><br>
</form><br>
<form action="{{route('diagnosticos.index')}}" method="GET">
    <button type="submit">Volver al inicio</button><br>
</form>
@else
{{view('admin.index');}}
@endif
@stop