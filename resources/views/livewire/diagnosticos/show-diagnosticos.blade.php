<div>
    <br><br>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="grid grid-cols-2 justify-items-start bg-gray-200">
            <div class="mb-4">
                <x-jet-label value="Cedula paciente | Nombre del Paciente" />
                <select wire:model="id_exp">
                    @foreach ($expedientes as $expediente)
                        @if ($expediente->id_tenant == Auth::id())
                        <option value="{{ $expediente->id_expediente }}">
                            {{ $expediente->cedula }} | {{ $expediente->nombre }}
                            {{ $expediente->apellidos }}</option>
                        @endif
                        @endforeach
                </select>
            </div>
            <div class="justify-self-end">
                <button type="button" class="btn btn-primary mt-4 mb-4 justify-end"
                    onclick="Livewire.emit('openModal', 'diagnosticos.modal-crear', {{ json_encode(['id_exp' => $id_exp]) }})">
                    Nuevo Diagnostico
                </button>
            </div>
        </div>
        @if (sizeof($diagnosticos) > 0)
            <table
                class="border-separate border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <div class="flex items-center">
                    <input wire:model="search"
                        class="flex-1 ml-4 mb-4 mr-4 bg-gray-200 appearance-none border-2 border-black rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                        placeholder="Buscar..." type="text">
                </div>
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Nombre del Medico
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Categoria de Diagnostico
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Fecha de emision
                        </th>
                        <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnosticos as $diagnostico)
                        @if ($diagnostico->id_tenant == Auth::id() && $diagnostico->id_expediente == $id_exp)
                            <tr
                                class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    <a
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $diagnostico->nombre_medico }}</a>
                                </td>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $diagnostico->categoria }}
                                </td>
                                <td
                                    class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                    {{ $diagnostico->fecha_emision }}
                                </td>
                                <td>
                                    <div class="flex flex-row space-x-4 justify-center">
                                        <button
                                            class="bg-yellow-500 hover:bg-yellow-300 dark:hover:bg-yellow-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
                                            type="submit" data-toggle="modal"
                                            onclick="Livewire.emit('openModal', 'diagnosticos.modal-editar', {{ json_encode(['diagnostico' => $diagnostico]) }})"><i
                                                class="fas fa-edit"></i></button><br>
                                        <form action="{{ route('diagnosticos.destroy', $diagnostico) }}"
                                            method="post">
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
        @if ($diagnosticos->hasPages())
            <div class="px-6 py-3">
                {{ $diagnosticos->links() }}
            </div>
        @endif
    </div>
</div>
{{-- @else
                <div class="text-lg text-black text-center">No se encuentran Diagnosticos registrados...</div>
            @endif --}}
