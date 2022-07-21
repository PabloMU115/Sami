<?php

namespace App\Http\Livewire\Inventario;

use LivewireUI\Modal\ModalComponent;

class ModalCrear extends ModalComponent
{

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.inventario.modal-crear');
    }
}
