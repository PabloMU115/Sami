@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('detalles', ['title' => substr(str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'), 1, 3), 'clientes' => $usuarios, 'inventario' => $inventario])
            </div>
        </div>
    </div>


@stop
