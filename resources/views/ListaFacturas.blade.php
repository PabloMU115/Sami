@extends('adminlte::page')

@section('title', 'Facturacion')

@section('content')
@if (Auth::user()->active == 0 && Auth::user()->type == 1)
    <script>
        window.location.href = "/admin/actualizarPago";
    </script>
@endif
    @if (sizeof($ListaFacturas) > 0)

        <br>

        <div class="container">


            <div class="row">


                <div class="col-12">



                    <table class="table table-hover table-bordered table-sm" id="tabla_detalles">


                        <thead class="table-dark">

                            <tr>

                                <th>Nombre</th>
                                <th>Numero_Factura</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Total</th>

                            </tr>


                        </thead>


                        <tbody>




                            @foreach ($ListaFacturas as $item)
                                <tr>
                                    <td>{{ $item->nombre_cliente }}</td>
                                    <td>{{ $item->numero_factura }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>Aprobado</td>
                                    <td><span class="badge bg-success" id="total">{{ $item->total }}</span></td>
                                </tr>
                            @endforeach






                        </tbody>

                    </table>


                    {{-- <h4>Total:<span class="badge bg-danger" id="total">0</span></h4> --}}




                </div>



            </div>

            <a href="{{ route('convertirpdf') }}" class=" btn btn-primary stretched-link">Generar PDF</a>

        </div>
    @else
        <br><br><br>
        <div class="ml-96 mr-96 px-24 ">

            <h1 class="bg-red">No se encuentran facturas registradas</h1>

        </div>



    @endif




@stop
