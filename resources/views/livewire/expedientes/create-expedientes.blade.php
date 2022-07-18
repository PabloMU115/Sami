<div>
    <div class="grid grid-cols-2 gap-4">
        <div class="mb-4 ml-4">
            <x-jet-label value="Cedula" />
            <x-jet-input class="border-2 border-black rounded" type="text" wire:model="cedula" />
            <br>
            <x-jet-input-error for="cedula" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Nombre" />
            <x-jet-input class="border-2 border-black rounded" type="text" wire:model="nombre" />
            <br>
            <x-jet-input-error for="nombre" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Apellidos" />
            <x-jet-input class="border-2 border-black rounded" type="text" wire:model="apellidos" />
            <br>
            <x-jet-input-error for="apellidos" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Edad" />
            <x-jet-input class="border-2 border-black rounded" type="number" min="0" max="130"
                wire:model="edad" />
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Seleccione el Genero" />
            <select id="genero" wire:model="genero">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Seleccione el Tipo de Sangre" />
            <select name="tipo_sangre" wire:model="tipo_sangre">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <div class="mb-4 ml-4">
            <x-jet-label value="Alergias" />
            <x-jet-input class="border-2 border-black rounded" type="text" wire:model="alergias" />
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
