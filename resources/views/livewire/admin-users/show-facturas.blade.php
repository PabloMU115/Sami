<div>
    <div class="overflow-x-auto mb-4 relative sm:rounded-lg">
        <table
            class="mt-16 border-separate shadow-md border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            {{ $facturas }}
            @if (sizeof($facturas) > 0)
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            ID Factura
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Nombre Completo
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Monto
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Fecha realizada
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                        <tr
                            class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $factura->numero_factura }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $factura->nombre_cliente }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                ${{ $factura->total }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $factura->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
            <h1 class="ml-96 mr-96 bg-red-300 text-center rounded py-2">No se encuentran Facturas registradas en el
                sistema</h1>
            @endif
        </table>
        @if ($facturas->hasPages())
            <div class="px-6 py-3">
                {{ $facturas->links() }}
            </div>
        @endif
    </div>
</div>
