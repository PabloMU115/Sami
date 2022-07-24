<div>
    <div class="overflow-x-auto mb-4 relative sm:rounded-lg">
        <table
            class="mt-16 border-separate shadow-md border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            {{ $tenants }}
            @if (sizeof($tenants) > 0)
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Nombre Completo
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            EMAIL
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Estado de la Suscripcion
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Inicio de la suscripcion
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Final de la suscripcion
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Creacion del Tenant
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr
                            class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                            <th scope="row" class="text-center py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $tenant->id }}
                            </th>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $tenant->name }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $tenant->email }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                @if ($tenant->active == 1)
                                <label class="bg-green px-2 py-1 border rounded">
                                    <i class="far fa-check-square"></i>
                                    Activa</label>
                                @else
                                <label class="bg-red px-1 py-1 border rounded">
                                    <i class="far fa-window-close bg-red"></i> 
                                    Inactiva</label>
                                @endif
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $tenant->inicio_sub }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $tenant->vencimiento_sub }}
                            </td>
                            <td
                                class="text-center border border-slate-700 py-1 px-1 font-medium text-gray-900  dark:text-white">
                                {{ $tenant->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
            <h1 class="ml-96 mr-96 bg-red-300 text-center rounded py-2">No se encuentran Tenants registrados en el
                sistema</h1>
            @endif
        </table>
        @if ($tenants->hasPages())
            <div class="px-6 py-3">
                {{ $tenants->links() }}
            </div>
        @endif
    </div>
</div>
