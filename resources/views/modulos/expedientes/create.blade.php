@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
<form action="{{route('expedientes.store')}}" method="POST">
    @csrf
    <label for="">
        Cedula:
        <br>
     <input type="text" name="cedula" value="{{old('cedula')}}">
     </label>
    <br>
    @error('cedula')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <label for="">
            Nombre:
            <br>
        <input type="text" name="nombre" value="{{old('nombre')}}">
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
        <input type="text" name="apellidos" value="{{old('apellidos')}}">
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
        <input type="text" name="edad" value="{{old('edad')}}">
     </label>
    <br>
    @error('edad')
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
  <label for="genero">Seleccione Genero:</label>
    <select name="genero" id="genero">
    <option value="M">M</option>
    <option value="F">F</option>
  </select>
    <br>
    <label>
            Alergias:
            <br>
            <textarea name="alergias" rows="6" value="Ninguna">Ninguna</textarea>
     </label>
    <br>
    <br>
<label for="tipo_sangre">Seleccione el Tipo de Sangre:</label>
    <br>
    <select name="tipo_sangre" id="tipo_sangre">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="AB">AB</option>
    <option value="O">O</option>
  </select>
<br>
<br>
    <button type="submit">Guardar</button>
</form>
@stop