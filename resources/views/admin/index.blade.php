@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
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
