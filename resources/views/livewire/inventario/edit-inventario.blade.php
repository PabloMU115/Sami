<div>
    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4 ml-4">
            <x-jet-label value="Nombre" />
            <x-jet-input class="border-2 border-black rounded" type="text" minlength="3" maxlength="40"
                wire:model="nombre_producto" />
            <br>
            <x-jet-input-error for="nombre_producto" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Proveedor" />
            <x-jet-input class="border-2 border-black rounded" type="text" minlength="3" maxlength="20"
                wire:model="proveedor" />
            <br>
            <x-jet-input-error for="proveedor" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Cantidad" />
            <x-jet-input class="w-20 border-2 border-black rounded" type="text"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="0"
                maxlength="6" wire:model="cantidad" />
            <br>
            <x-jet-input-error for="cantidad" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Precio por Unidad" />
            <x-jet-input class="w-20 border-2 border-black rounded" type="text"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="0"
                maxlength="6" wire:model="precio" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Seleccione el Tipo de Producto" />
            <select name="tipo" wire:model="tipo">
                <option value="0">Medicamento</option>
                <option value="1">Utencilio Medico</option>
                <option value="2">Protesis</option>
                <option value="3">Material Quirurgico</option>
                <option value="4">Producto Higienico</option>
            </select>
        </div><br>
        <div class="mb-4 ml-4">
            <x-jet-label value="Descripcion" />
            <textarea rows="6" class="w-full border-2 border-black rounded" maxlength="200" wire:model="descripcion"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <x-jet-secondary-button class="mb-4 mt-4 ml-4 mr-4" wire:click="$emit('cerrar')">
            Cancelar
        </x-jet-secondary-button>
        <x-jet-danger-button class="mb-4 mt-4 ml-4 mr-4" wire:click="save">
            Guardar
        </x-jet-danger-button>
    </div>
</div>
