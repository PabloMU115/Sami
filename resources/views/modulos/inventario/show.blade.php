@extends('adminlte::page')

@section('title', 'Inventario')

@section('content')
@if ($inventario->id_tenant == Auth::id())
<h1>Editar producto: {{$inventario->id_producto}}</h1>
<p>ID: {{$inventario->id_producto}}</p>
<p>Nombre del Producto: {{$inventario->nombre_producto}}</p>
<p>Nombre nombre del Proveedor: {{$inventario->proveedor}}</p>
<p>Cantidad disponible: {{$inventario->cantidad}}</p>
<p>Precio por unidad: {{$inventario->precio}}</p>
<p>Tipo de producto: {{$inventario->tipo}}</p>
<p>Descripcion: {{$inventario->descripcion}}</p>
<br>
<form action="{{route('inventario.index')}}" method="GET">
    <button type="submit">Volver al inicio</button><br>
</form>
@else
{{view('admin.index');}}
@endif
@stop