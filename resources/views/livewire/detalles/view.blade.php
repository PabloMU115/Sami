@section('title', __('Detalles'))
@if (Auth::user()->active == 0 && Auth::user()->type == 1)
    <script>
        window.location.href = "/admin/actualizarPago";
    </script>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class=""></i>
                                Lista de Detalles </h4>
                        </div>
                        {{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif

                        @if (sizeof($clientes) > 0)
                            <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
                                <i class="fa fa-plus"></i> Añadir Detalles
                            </div>
                        @endif


                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.detalles.create')
                    @include('livewire.detalles.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Id Tenant</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th>Numero Factura</th>
                                    <td>ACCIONES</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalles as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->id_tenant }}</td>
                                        <td>{{ $row->descripcion }}</td>
                                        <td>{{ $row->categoria }}</td>
                                        <td>{{ $row->cantidad }}</td>
                                        <td>{{ $row->precio }}</td>
                                        <td>{{ $row->subtotal }}</td>
                                        <td>{{ $row->numero_factura }}</td>
                                        <td width="90">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-toggle="modal" data-target="#updateModal"
                                                        class="dropdown-item" wire:click="edit({{ $row->id }})"><i
                                                            class="fa fa-edit"></i> Editar </a>
                                                    <a class="dropdown-item"
                                                        onclick="confirm('Confirm Delete Detalle id {{ $row->id }}? \nDeleted Detalles cannot be recovered!')||event.stopImmediatePropagation()"
                                                        wire:click="destroy({{ $row->id }})"><i
                                                            class="fa fa-trash"></i> Eliminar </a>
                                                </div>
                                            </div>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $detalles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>




    <form action="{{ route('/generarf', $title) }}" method="POST">

        @csrf
        <br>
        @if (sizeof($clientes) > 0)
            <label for="">Seleccione un cliente : </label>

            <select class="form-select" aria-label="Default select example" name="id_cliente" style="width: 190px;">

                @foreach ($clientes as $item)
                    <option value={{ $item->id_expediente }}>{{ $item->nombre }}</option>
                @endforeach
            </select>
            <br><br><br>

            <button class="btn btn-success ">Generar Factura+</button>
        @else
            <h1>No se encuentran expedientes registrados en el sistema</h1>

        @endif



    </form>
</div>