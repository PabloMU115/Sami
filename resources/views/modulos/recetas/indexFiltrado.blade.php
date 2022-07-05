@extends('adminlte::page')

@section('title', 'recetas')

@section('content')
@if ($recetas[0]->id_tenant == Auth::id())
@if (sizeof($recetas)>0)
    <h2>Recetas del expediente {{$expedientes[0]->nombre}} {{$expedientes[0]->apellidos}}</h2>
    <table>
        <tr>
          <td><strong>ID</strong></td>
          <td><strong>Nombre del Encargado</strong></td>
          <td><strong>Fecha Emision</strong></td>
        </tr>
    @foreach ($recetas as $receta)
        <tr>
            <td>{{$receta->id_receta}}</td>
            <td>{{$receta->nombre_medico}}</td>
            <td>{{$receta->fecha_emision}}</td>
            <td><form action="{{route('recetas.destroy',$receta)}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
                <button type="submit">Eliminar</button>
            </form></td>
            <td><form action="{{route('recetas.edit',$receta)}}" method="GET">
                <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
                <button type="submit">Editar</button><br>
            </form></td>
          </tr>
    @endforeach
    </table>
    @else
    <br>No se encuentran recetas registradas para este paciente...   
    @endif
</ul>
{{$recetas->links()}}
<br>
<form action="{{route('recetas.create')}}" method="GET">
    <input type="hidden" name="id_expediente" value="{{$expedientes[0]->id_expediente}}">
    <button type="submit">Crear Receta</button>
</form><br>
<form action="{{route('recetas.index')}}" method="GET">
    <button type="submit">Volver</button><br>
</form>
@else
{{view('admin.index');}}
@endif
@stop