<div>
    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4 ml-4">
            <x-jet-label value="Nombre del Encargado" />
            <x-jet-input class="border-2 border-black rounded" type="text" wire:model="nombre_medico" />
            <br>
            <x-jet-input-error for="nombre_medico" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Indicaciones" />
            <x-jet-input class="border-2 border-black rounded" type="text" wire:model="indicaciones"/>
            <br>
            <x-jet-input-error for="indicaciones" />
        </div>
    </div>
    <div class="modal-footer grid grid-cols-2 justify-items-end">
        <x-jet-secondary-button class="justify-self-start" wire:click="$emit('cerrar')">
            Cancelar
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="save">
            Guardar
        </x-jet-danger-button>
    </div>
</div>
