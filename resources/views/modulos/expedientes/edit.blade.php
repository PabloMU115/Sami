@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
<form action="{{route('expedientes.update',$expediente)}}" method="post">
    @csrf
    @method('put')
    <label for="">
        Nombre:
        <br>
    <input type="text" name="nombre" value="{{old('nombre', $expediente->nombre)}}">
    </label>
    <br>
    @error('nombre')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <label for="">
        Apellidos:
        <br>
    <input type="text" name="apellidos" value="{{old('apellidos', $expediente->apellidos)}}">
    </label>
    <br>
    @error('apellidos')
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <label for="">
        Edad:
        <br>
    <input type="text" name="edad" value="{{old('edad', $expediente->edad)}}">
    </label>
    <br>
    @error('edad')
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <label for="genero">Seleccione el Genero:</label>
    <br>
        <select name="genero" id="genero">
            @if($expediente->genero =='F')         
            <option value="F" selected>F</option>
            <option value="M">M</option>
            @else
            <option value="F">F</option>
            <option value="M" selected>M</option>  
            @endif
    </select>
    <br>
    <br>
    <label>
        Alergias:
        <br>
        <textarea name="alergias" rows="6" value="{{old('alergias', $expediente->alergias)}}">{{old('alergias', $expediente->alergias)}}</textarea>
    </label>
    <br>
    @error('alergias')
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <button type="submit">Guardar</button>
</form>
<br>
<form action="{{route('expedientes.index')}}" method="GET">
    <button type="submit">Volver</button><br>
</form>
@stop