@extends('adminlte::page')

@section('title', 'recetas')

@section('content_header')
<h1>Aquí inician las Recetas</h1>
<ul>
    <form action="{{route('recetas.indexFiltrado')}}" method="GET">
    @if (sizeof($expedientes)>0)
    <label for="id_expediente">Seleccione el Expediente que desea gestionar:</label><br>
    <select name="id_expediente" id="id_expediente"><br>
    @foreach ($expedientes as $expediente)
    <option value="{{$expediente->id_expediente}}">{{$expediente->nombre}}  {{$expediente->apellidos}} | {{$expediente->id_expediente}} </option>
    @endforeach
    </select><br>
    @else
    <label>No hay expedientes guardados...</label> 
    @endif
    <br>
    <button type="submit">Buscar Recetas</button>
</form>
<script>
</script>
@endsection