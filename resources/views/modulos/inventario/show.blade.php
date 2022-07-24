@extends('adminlte::page')

@section('title', 'Inventario')

@section('content')
    @if ($inventario->id_tenant == Auth::id())
        <div class="ml-72 mr-64 bg-gray-200 rounded">
            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4 ml-4">
                    <x-jet-label class="mt-20" value="ID del Producto" />
                    {{ $inventario->id_producto }}
                </div>
                <div class="mb-4 ml-4">
                    <x-jet-label class="mt-20" value="Nombre del Producto" />
                    {{ $inventario->nombre_producto }}
                </div>
                <div class="mt-20 ml-4">
                    <x-jet-label value="Proveedor" />
                    {{ $inventario->proveedor }}
                </div>
                <div class="mt-20 ml-4">
                    <x-jet-label value="Tipo de Producto" />
                    @switch($inventario->tipo)
                        @case(0)
                            Medicamento
                        @break

                        @case(1)
                            Utencilio Medico
                        @break

                        @case(2)
                            Protesis
                        @break

                        @case(3)
                            Material Quirurgico
                        @break

                        @case(4)
                            Producto Higienico
                        @break
                    @endswitch
                </div>
                <div class="mt-20 ml-4">
                    <x-jet-label value="Cantidad en almacenamiento" />
                    {{ $inventario->cantidad }}
                </div>
                <div class="mt-20 ml-4">
                    <x-jet-label value="Precio por unidad" />
                    {{ $inventario->precio }}
                </div>
                <div class="mt-20 mb-10 ml-4">
                    <x-jet-label value="Descripcion" />
                    {{ $inventario->descripcion }}
                </div>
            </div>
            <div class="mt-20 ml-20 grid grid-cols-2 justify-items-end">
                <form action="{{ route('inventario.index') }}" method="GET">
                    <x-jet-danger-button type="submit">
                        Volver
                    </x-jet-danger-button>
                </form>
            </div>
        </div>
    @else
        <script>
            window.location.href = "/admin/inventario";
        </script>
    @endif
@stop
