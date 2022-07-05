@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
<h1>Aquí inician los Productos Guardados en el inventario</h1>
<br>
@if (sizeof($inventario)>0)
<table>
<tr>
    <td><strong>ID</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Proveedor</strong></td>
    <td><strong>Cantidad disponible</strong></td>
    <td><strong>Precio por unidad</strong></td>
    <td><strong>Tipo</strong></td>
  </tr>
@foreach ($inventario as $productos)
      <tr>
          <td>{{$productos->id_producto}}</td>
          <td><a href="{{route('inventario.show',$productos)}}">{{$productos->nombre_producto}}</a></td>
          <td>{{$productos->proveedor}}</td>
          <td>{{$productos->cantidad}}</td>
          <td>{{$productos->precio}}</td>
          <td>{{$productos->tipo}}</td>
        <td><form action="{{route('inventario.edit',$productos)}}" method="GET">
            <button type="submit">Editar</button><br>
        </form></td>
        <td><form action="{{route('inventario.destroy',$productos)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Eliminar</button><br>
        </form></td>
        </tr>
@endforeach
</table>
<div >
  {{$inventario->links()}}
</div>
@else
<h3>No se encuentran Productos registrados en el inventario...</h3>
@endif

@stop