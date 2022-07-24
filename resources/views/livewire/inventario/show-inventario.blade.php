<div>
    <div class="overflow-x-auto mb-4 relative sm:rounded-lg">
        <table
            class="mt-2 border-separate shadow-md border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            @if (sizeof($inventario) > 0)
                <div class="flex justify-center">
                    <button type="button" class="btn btn-primary mt-5 mb-4"
                        onclick="Livewire.emit('openModal', 'inventario.modal-crear')">
                        Nuevo Producto
                    </button>
                </div>
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Nombre
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Cantidad
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Tipo
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Proveedor
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventario as $inv)
                        @if ($inv->id_tenant == Auth::id())
                            <tr
                                class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                <th scope="row" class="text-center  font-medium text-gray-900  dark:text-white">
                                    {{ $inv->id_producto }}
                                </th>
                                <td
                                    class="text-center border border-slate-700  font-medium text-gray-900 dark:text-white">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        href="{{ route('inventario.show', $inv->id_producto) }}">{{ $inv->nombre }}
                                        {{ $inv->nombre_producto }}</a>
                                </td>
                                <td
                                    class="text-center border border-slate-700  font-medium text-gray-900  dark:text-white">
                                    {{ $inv->cantidad }}
                                </td>
                                <td
                                    class="text-center border border-slate-700  font-medium text-gray-900  dark:text-white">
                                    @switch($inv->tipo)
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
                                </td>
                                <td
                                    class="text-center border border-slate-700  font-medium text-gray-900  dark:text-white">
                                    {{ $inv->proveedor }}
                                </td>
                                <td>
                                    <div class="flex flex-row space-x-4 justify-center">
                                        <button
                                            class="bg-yellow-500 hover:bg-yellow-300 dark:hover:bg-yellow-500 text-gray-700 font-bold mt-1 mb-1 py-1 px-4 border border-blue-700 rounded"
                                            type="submit" data-toggle="modal"
                                            onclick="Livewire.emit('openModal', 'inventario.modal-editar',{{ json_encode(['inventario' => $inv]) }})"><i
                                                class="fas fa-edit"></i></button><br>
                                        <form action="{{ route('inventario.destroy', $inv) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="bg-red-500 hover:bg-red-300 dark:hover:bg-red-500 text-gray-700 font-bold mt-1 mb-1 py-1 px-4 border border-blue-700 rounded"
                                                type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            @else
                <div class="flex justify-center">
                    <button type="button" class="btn btn-primary mt-5 mb-4"
                        onclick="Livewire.emit('openModal', 'inventario.modal-crear')">
                        Nuevo Producto
                    </button>
                </div>
                <h1 class="ml-96 mr-96 bg-red-300 text-center rounded py-2">No se encuentran Productos registrados en el
                    sistema</h1>
            @endif
        </table>
        @if ($inventario->hasPages())
            <div class="px-6 py-3">
                {{ $inventario->links() }}
            </div>
        @endif
    </div>
</div>
