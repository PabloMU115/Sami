@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')
@if (Auth::user()->type == 2)
        <script>
            window.location.href = "/admin/crearUsuario";
        </script>
    @endif
    @if (Auth::user()->active == 1 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/expedientes";
        </script>
    @endif
    @if (Auth::user()->active == 0 && Auth::user()->type == 1)
        <script>
            window.location.href = "/admin/actualizarPago";
        </script>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        //     Swal.fire(
        //   'Good job!',
        //   'You clicked the button!',
        //   'success'
        // )
    </script>
@stop
