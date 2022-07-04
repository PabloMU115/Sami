@extends('adminlte::page')

@section('title', 'Crear Usuarios')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Correo Electronico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Guardar') }}
                </x-jet-button>
            </div>
            NOTA: Una vez el nuevo usuario sea creado, este podrá iniciar sesion ingresando su email y el nombre ingresado como contraseña.
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@stop
