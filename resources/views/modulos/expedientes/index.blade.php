@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
<h1>Aquí inician los EXPEDIENTES</h1>
<ul>
    @if (sizeof($expedientes)>0)
    @foreach ($expedientes as $expediente)
    <br>
    <li>
        <a href="{{route('expedientes.show',$expediente->id_expediente)}}">{{$expediente->nombre}}</a>
    </li> 
    @endforeach
    @else
    <br>No se encuentran Expedientes registrados...   
    @endif
</ul>
{{$expedientes->links()}}
@stop

