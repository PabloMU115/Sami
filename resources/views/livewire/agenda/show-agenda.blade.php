<div>
    <div class="overflow-x-auto mb-4 relative sm:rounded-lg">
        <table
            class="mt-2 border-separate border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            @if (sizeof($agendas) > 0)
                <div class="flex justify-center">
                    <button type="button" class="btn btn-primary mt-5 mb-4"
                        onclick="Livewire.emit('openModal', 'agenda.modal-crear')">
                        Nuevo Recordatorio
                    </button>
                </div>
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Fecha
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Descripcion
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendas as $agenda)
                        @if ($agenda->id_tenant == Auth::id())
                            <tr
                                class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                <th scope="row"
                                    class="text-center py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $agenda->fecha }}
                                </th>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $agenda->descripcion }}
                                </td>
                                <td>
                                    <div class="flex flex-row space-x-4 justify-center">
                                        <button
                                            class="bg-yellow-500 hover:bg-yellow-300 dark:hover:bg-yellow-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
                                            type="submit" data-toggle="modal"
                                            onclick="Livewire.emit('openModal', 'agenda.modal-editar',{{ json_encode(['agenda' => $agenda]) }})"><i
                                                class="fas fa-edit"></i></button><br>
                                        <form action="{{ route('agenda.destroy', $agenda) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="bg-red-500 hover:bg-red-300 dark:hover:bg-red-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
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
                        onclick="Livewire.emit('openModal', 'agenda.modal-crear')">
                        Nuevo Recordatorio
                    </button>
                </div>
                <h1 class="ml-96 mr-96 bg-red-300 text-center rounded py-2">No hay Recordatorios registrados</h1>
            @endif
        </table>
        @if ($agendas->hasPages())
            <div class="px-6 py-3">
                {{ $agendas->links() }}
            </div>
        @endif
    </div>
</div>
