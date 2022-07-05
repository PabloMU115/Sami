@extends('adminlte::page')

@section('title', 'Inventario')

@section('content')
@if ($inventario->id_tenant == Auth::id())
<form action="{{route('inventario.update', $inventario)}}" method="post">
    @csrf
    @method('put')
    <label for="">
        Nombre del Producto:
        <br>
     <input type="text" name="nombre_producto" value="{{old('nombre_producto', $inventario->nombre_producto)}}">
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
        <input type="text" name="proveedor" value="{{old('proveedor', $inventario->proveedor)}}">
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
        <input type="text" name="cantidad" value="{{old('cantidad', $inventario->cantidad)}}">
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
        <input type="text" name="precio" value="{{old('precio', $inventario->precio)}}">
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
        <input type="text" name="tipo" value="{{old('tipo', $inventario->tipo)}}">
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
            <textarea name="descripcion" rows="6" value="{{old('descripcion')}}">{{$inventario->descripcion}}</textarea>
     </label>
    <br>
    @error('descripcion')
        <small>*{{$message}}</small>
        <br>
    @enderror
    <br>
    <button type="submit">Guardar</button>
</form>
<br>
<form action="{{route('inventario.index')}}" method="GET">
    <button type="submit">Volver al inicio</button><br>
</form>
@else
{{view('admin.index');}}
@endif
@stop