@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content')
@if ($expediente->id_tenant == Auth::id())
<div class="ml-72 mr-64 bg-gray-200 rounded">
    <div class="grid grid-cols-3 gap-4">
        <div class="mb-4 ml-4">
            <x-jet-label class="mt-20" value="Cedula del Paciente" />
            {{$expediente->cedula}}
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label class="mt-20" value="Nombre del Paciente" />
            {{$expediente->nombre}} {{$expediente->Apellidos}}
        </div>
        <div class="mt-20 mb-4 ml-4">
            <x-jet-label value="Edad del Paciente" />
            {{$expediente->edad}}
        </div>
        <div class="mt-20 mb-4 ml-4">
            <x-jet-label value="Genero" />
            @if ($expediente->genero=="F")
                Femenino
            @else
                Masculino
            @endif
        </div>
        <div class="mt-20 mb-4 ml-4">
            <x-jet-label value="Tipo de Sangre del Paciente" />
            {{$expediente->tipo_sangre}}
        </div>
        <div class="mt-20 mb-4 ml-4">
            <x-jet-label value="Alergias del Paciente" />
            {{$expediente->alergias}}
        </div>
    </div>
    <div class="mt-20 ml-20 grid grid-cols-2 justify-items-end">
        <form action="{{route('expedientes.index')}}" method="GET">
            <x-jet-danger-button type="submit">
                Volver
            </x-jet-danger-button>
        </form>
    </div>
</div>
@else
<script>
    window.location.href = "/admin/expedientes";
</script>
@endif
@stop