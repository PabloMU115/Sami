@extends('adminlte::page')

@section('title', 'Actualizar Pago')

@section('content')
    <div class="mr-96 ml-96">
        <form action="{{ route('admin.update') }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="mt-4 font-bold text-sm mb-2 ml-5">Nombre del propietario de la tarjeta</label>
                <div>
                    <input
                        class="w-72 px-3 py-2 ml-3 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        name="Propietario" maxlength="50" minlength="7" value="{{ old('Propietario') }}" maxlength="100"
                        placeholder="Nombre del Propietario" type="text" required />
                </div>
            </div>
            <div class="mb-3">
                <label class="font-bold text-sm mb-2 ml-24">Número de Tarjeta</label>
                <div>
                    <input
                        class="w-72 px-3 py-2 mb-1 ml-3 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        name="Numero de Tarjeta" minlength="16" maxlength="16" placeholder="0000 0000 0000 0000"
                        type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        required />
                </div>
            </div>
            <div class="flex items-end mb-4 ml-2">
                <div class="px-2 w-48">
                    <label class="font-bold text-sm mb-2 ml-24">Fecha de vencimiento</label>
                    <div>
                        <label class="text-sm mb-2 ml-1">Mes</label><br>
                        <select
                            class="form-select w-30 px-2 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                            <option value="01">01 - Enero</option>
                            <option value="02">02 - Febrero</option>
                            <option value="03">03 - Marzo</option>
                            <option value="04">04 - Abril</option>
                            <option value="05">05 - Mayo</option>
                            <option value="06">06 - Junio</option>
                            <option value="07">07 - Julio</option>
                            <option value="08">08 - Augosto</option>
                            <option value="09">09 - Septiembre</option>
                            <option value="10">10 - Octubre</option>
                            <option value="11">11 - Noviembre</option>
                            <option value="12">12 - Diciembre</option>
                        </select>
                    </div>
                </div>
                <div class="px-2 w-1/2">
                    <label class="text-sm mb-2 ml-1">Año</label><br>
                    <select
                        class="form-select w-30 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
            </div>
            <div class="mb-10 ml-3">
                <label class="font-bold text-sm mb-2 ml-20">Codigo de Seguridad</label>
                <div>
                    <input
                        class="w-32 px-3 py-2 mb-1 ml-20 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                        name="Codigo de Tarjeta" minlength="3" maxlength="3" placeholder="000" type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
                </div>
            </div>
            <div>
            </div>
            <input type="text" hidden name="id" value="{{ Auth::user()->id }}">
            <button
                class="block w-44 max-w-xs ml-20 bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"
                type="submit"><i class="mdi mdi-lock-outline mr-1"></i>Finalizar Pago</button>
        </form>
    </div>
@stop
