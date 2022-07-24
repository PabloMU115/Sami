@extends('adminlte::page')

@section('title', 'diagnosticos')

@section('content')
@if ($diagnostico->id_tenant == Auth::id())
<div class="ml-72 mr-64 bg-gray-200 rounded">
    <div class="grid grid-cols-3 gap-4">
        <div class="mb-4 ml-4">
            <x-jet-label class="mt-20" value="Nombre del Encargado" />
            {{$diagnostico->nombre_medico}}
        </div>
        <div class="mt-20 mb-4 ml-4">
            <x-jet-label value="Categoria" />
            {{$diagnostico->categoria}}
        </div>
        <div class="mt-20 mb-4 ml-4">
            <x-jet-label value="Descripcion" />
            {{$diagnostico->descripcion}}
        </div>
    </div>
    <div class="mt-20 ml-20 grid grid-cols-2 justify-items-end">
        <form action="{{route('diagnosticos.index')}}" method="GET">
            <x-jet-danger-button type="submit">
                Volver
            </x-jet-danger-button>
        </form>
    </div>
</div>
@else
<script>
    window.location.href = "/admin/diagnosticos";
</script>
@endif
@stop