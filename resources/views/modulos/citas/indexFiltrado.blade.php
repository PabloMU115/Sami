@extends('adminlte::page')

@section('title', 'Citas')

@section('content')
@if ($citas[0]->id_tenant == Auth::id())
@if (sizeof($citas)>0)
<h2>Citas del expediente {{$expedientes[0]->nombre}} {{$expedientes[0]->apellidos}}</h2>
<table>
    <tr>
      <td><strong>ID</strong></td>
      <td><strong>Nombre del Encargado</strong></td>
      <td><strong>Fecha</strong></td>
    </tr>
@foreach ($citas as $cita)
    <tr>
        <td>{{$cita->id_cita}}</td>
        <td>{{$cita->nombre_medico}}</td>
        <td>{{$cita->fecha}}</td>
        <td><form action="{{route('citas.destroy',$cita)}}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
            <button type="submit">Eliminar</button>
        </form></td>
        <td><form action="{{route('citas.edit',$cita)}}" method="GET">
            <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
            <button type="submit">Editar</button><br>
        </form></td>
      </tr>
@endforeach
</table>
@else
<br>No se encuentran citas registradas para este paciente...   
@endif
</ul>
{{$citas->links()}}
<br>
<form action="{{route('citas.create')}}" method="GET">
<input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
<button type="submit">Crear Cita</button>
</form><br>
<form action="{{route('citas.index')}}" method="GET">
<button type="submit">Volver</button><br>
</form>
@else
{{view('admin.index');}}
@endif
@stop