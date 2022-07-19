<div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="border-separate border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <div class="flex justify-end">
                <button type="button" class="btn btn-primary mt-4 mb-4"
                    onclick="Livewire.emit('openModal', 'expedientes.modal-crear')">
                    Nuevo Expediente
                </button>
            </div>
            @if (sizeof($expedientes) > 0)
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Cedula
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Nombre Completo
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Edad
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Tipo de Sangre
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Genero
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expedientes as $expediente)
                        @if ($expediente->id_tenant == Auth::id())
                            <tr
                                class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                <th scope="row"
                                    class="text-center py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $expediente->cedula }}
                                </th>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        href="{{ route('expedientes.show', $expediente->id_expediente) }}">{{ $expediente->nombre }}
                                        {{ $expediente->apellidos }}</a>
                                </td>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $expediente->edad }}
                                </td>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $expediente->tipo_sangre }}
                                </td>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $expediente->genero }}
                                </td>
                                <td>
                                    <div class="flex flex-row space-x-4 justify-center">
                                        <button
                                            class="bg-yellow-500 hover:bg-yellow-300 dark:hover:bg-yellow-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
                                            type="submit" data-toggle="modal"
                                            onclick="Livewire.emit('openModal', 'expedientes.modal-editar',{{ json_encode(['expediente' => $expediente]) }})"><i
                                                class="fas fa-edit"></i></button><br>
                                        <form action="{{ route('expedientes.destroy', $expediente) }}" method="post">
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
            @endif
        </table>
        @if ($expedientes->hasPages())
            <div class="px-6 py-3">
                {{ $expedientes->links() }}
            </div>
        @endif
    </div>
</div>
