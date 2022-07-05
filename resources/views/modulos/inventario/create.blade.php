@extends('adminlte::page')

@section('title', 'Inventario')

@section('content')
<form action="{{route('inventario.store')}}" method="POST">
    @csrf
    <label for="">
        Nombre del Producto:
        <br>
     <input type="text" name="nombre_producto" value="{{old('nombre_producto')}}">
     </label>
    <br>
    @error('nombre_producto')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <label for="">
            Proveedor:
            <br>
        <input type="text" name="proveedor" value="{{old('proveedor')}}">
     </label>
    <br>
    @error('proveedor')
    <small>*{{$message}}</small>
    <br>
    @enderror
    <br>
    <label for="">
            Cantidad Disponible:
            <br>
        <input type="text" name="cantidad" value="{{old('cantidad')}}">
        </label>
    <br>
    @error('cantidad')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <label for="">
            Precio por unidad:
            <br>
        <input type="text" name="precio" value="{{old('precio')}}">
        </label>
    <br>
    @error('precio')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <label for="">
            Tipo de producto:
            <br>
        <input type="text" name="tipo" value="{{old('tipo')}}">
        </label>
    <br>
    @error('tipo')
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
<br>
@stop