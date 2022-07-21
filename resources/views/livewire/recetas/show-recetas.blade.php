<div>
    @if (sizeof($expedientes) > 0)
        <div class="overflow-x-auto relative sm:rounded-lg">
            <div class="grid grid-cols-2 justify-items-start">
                <div class="mt-20 mb-4">
                    <label for="id_expediente">Seleccione el Expediente que desea gestionar:</label>
                    <select class="shadow-md rounded" wire:model="id_exp">
                        @foreach ($expedientes as $expediente)
                            @if ($expediente->id_tenant == Auth::id())
                            @switch($expediente->tipo)
                                @case(0)
                                <option class="bg-red" value="{{ $expediente->id_expediente }}">
                                    {{ $expediente->cedula }} | {{ $expediente->nombre }}
                                    {{ $expediente->apellidos }} | Inactivo</option>
                                    @break
                                @case(1)
                                <option class="bg-green" value="{{ $expediente->id_expediente }}">
                                    {{ $expediente->cedula }} | {{ $expediente->nombre }}
                                    {{ $expediente->apellidos }} | Activo</option>
                                    @break
                            @endswitch
                            @endif
                        @endforeach
                    </select>
                    <x-jet-label value="Cedula paciente | Nombre del Paciente" />
                </div>
                <div class="mt-20 justify-self-end">
                    @foreach ($expedientes as $expediente)
                        @if ($expediente->id_expediente == $id_exp && $expediente->tipo == '1')
                            <button type="button" class="btn btn-primary mt-4 mb-4 justify-end"
                                onclick="Livewire.emit('openModal', 'recetas.modal-crear', {{ json_encode(['id_exp' => $id_exp]) }})">
                                Nueva Receta
                            </button>
                        @endif
                    @endforeach
                </div>
            </div>
            @if (sizeof($recetas) > 0)
                <table
                    class="border-separate border border-slate-500 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                                Nombre del Medico
                            </th>
                            <th scope="col" class="text-center border border-slate-600 py-3 px-6">
                                Indicaciones
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
                        @foreach ($recetas as $receta)
                            @if ($receta->id_expediente == $id_exp && $receta->id_tenant == Auth::id())
                                <tr
                                    class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                    <td
                                        class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                        <a
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $receta->nombre_medico }}</a>
                                    </td>
                                    <td
                                        class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                        {{ $receta->indicaciones }}
                                    </td>
                                    <td
                                        class="text-center border border-slate-700 py-4 px-6 font-medium text-gray-900  dark:text-white">
                                        {{ $receta->fecha_emision }}
                                    </td>
                                    <td>
                                        <div class="flex flex-row space-x-4 justify-center">
                                            @foreach ($expedientes as $expediente)
                                                @if ($expediente->id_expediente == $id_exp && $expediente->tipo == '1')
                                                    <button
                                                        class="bg-yellow-500 hover:bg-yellow-300 dark:hover:bg-yellow-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
                                                        type="submit" data-toggle="modal"
                                                        onclick="Livewire.emit('openModal', 'recetas.modal-editar', {{ json_encode(['receta' => $receta]) }})"><i
                                                            class="fas fa-edit"></i></button><br>
                                                    <form action="{{ route('recetas.destroy', $receta) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            class="bg-red-500 hover:bg-red-300 dark:hover:bg-red-500 text-gray-700 font-bold py-2 px-4 border border-blue-700 rounded"
                                                            type="submit"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($recetas->hasPages())
                <div class="px-6 py-3">
                    {{ $recetas->links() }}
                </div>
            @endif
        </div>
    @else
        <h1>No se encuentran Expedientes registrados en el sistema</h1>
    @endif
</div>
