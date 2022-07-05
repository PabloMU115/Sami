@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content')
@if ($diagnosticos[0]->id_tenant == Auth::id())
@if (sizeof($diagnosticos)>0)
<h2>Diagnosticos del expediente {{$expedientes[0]->nombre}} {{$expedientes[0]->apellidos}}</h2>
<table>
    <tr>
      <td><strong>ID</strong></td>
      <td><strong>Nombre del Encargado</strong></td>
      <td><strong>Categoria</strong></td>
      <td><strong>Fecha Emision</strong></td>
      <td></td>
      <td></td>
    </tr>
@foreach ($diagnosticos as $diagnostico)
    <tr>
        <td>{{$diagnostico->id_diagnostico}}</td>
        <td>{{$diagnostico->nombre_medico}}</td>
        <td>{{$diagnostico->categoria}}</td>
        <td>{{$diagnostico->fecha_emision}}</td>
        <td><form action="{{route('diagnosticos.destroy',$diagnostico)}}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
            <button type="submit">Eliminar</button>
        </form></td>
        <td><form action="{{route('diagnosticos.edit',$diagnostico)}}" method="GET">
            <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
            <button type="submit">Editar</button><br>
        </form></td>
      </tr>
    @endforeach
    </table>
    @else
    <br>No se encuentran diagnosticos registrados para este paciente...   
    @endif
    </ul>
    {{$diagnosticos->links()}}
    <br>
    <form action="{{route('diagnosticos.create')}}" method="GET">
    <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <button type="submit">Crear Diagnostico</button>
    </form><br>
    <form action="{{route('diagnosticos.index')}}" method="GET">
    <button type="submit">Volver</button><br>
    </form>
@else
{{view('admin.index');}}
@endif
@stop