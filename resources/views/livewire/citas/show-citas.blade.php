<div>
    @if (sizeof($expedientes) > 0)
        <div class="overflow-x-auto relative sm:rounded-lg">
            <div class="grid grid-cols-2 justify-items-start">
                <div class="mt-20 mb-4">
                    <label for="id_expediente">Seleccione el Expediente que desea gestionar:</label>
                    <select class="shadow-md rounded" wire:model="id_exp">
                        @foreach ($expedientes as $expediente)
                            @if ($expediente->id_tenant == Auth::id())
                                <option value="{{ $expediente->id_expediente }}">
                                    {{ $expediente->cedula }} | {{ $expediente->nombre }}
                                    {{ $expediente->apellidos }}</option>
                            @endif
                        @endforeach
                    </select>
                    <x-jet-label value="Cedula paciente | Nombre del Paciente" />
                </div>
                <div class="mt-20 justify-self-end">
                    <button type="button" class="btn btn-primary mt-4 mb-4 justify-end"
                        onclick="Livewire.emit('openModal', 'citas.modal-crear', {{ json_encode(['id_exp' => $id_exp]) }})">
                        Nueva Cita
                    </button>
                </div>
            </div>
            @if (sizeof($citas) > 0)
                <table
                    class="border-separate border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                                Nombre del Medico
                            </th>
                            <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                                Fecha de la cita
                            </th>
                            <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            @if ($cita->id_expediente == $id_exp && $cita->id_tenant == Auth::id())
                                <tr
                                    class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                    <td
                                        class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                        <a
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $cita->nombre_medico }}</a>
                                    </td>
                                    <td
                                        class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                        {{ $cita->fecha }}
                                    </td>
                                    <td>
                                        <div class="flex flex-row space-x-4 justify-center">
                                            <button
                                                class="bg-yellow-500 hover:bg-yellow-300 dark:hover:bg-yellow-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
                                                type="submit" data-toggle="modal"
                                                onclick="Livewire.emit('openModal', 'citas.modal-editar', {{ json_encode(['cita' => $cita]) }})"><i
                                                    class="fas fa-edit"></i></button><br>
                                            <form action="{{ route('citas.destroy', $cita) }}" method="post">
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
                </table>
            @endif
            @if ($citas->hasPages())
                <div class="px-6 py-3">
                    {{ $citas->links() }}
                </div>
            @endif
        </div>
    @else
        <h1>No se encuentran Expedientes registrados en el sistema</h1>
    @endif
</div>
