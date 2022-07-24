<div>
    <div class="grid grid-cols-1 gap-4">
        <div class="mb-4 ml-4">
            <x-jet-label value="Fecha" />
            <x-jet-input class="border-2 border-black rounded" type="date" min="{{$fecha}}" wire:model="fecha"/>
            <br>
            <x-jet-input-error for="fecha" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Descripcion" />
            <textarea rows="6" class="w-full border-2 border-black rounded" maxlength="200" wire:model="descripcion"></textarea>
            <br>
            <x-jet-input-error for="descripcion" />
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
