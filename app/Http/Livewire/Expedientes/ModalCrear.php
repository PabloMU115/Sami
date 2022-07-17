<?php

namespace App\Http\Livewire\Expedientes;

use LivewireUI\Modal\ModalComponent;

class ModalCrear extends ModalComponent
{

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.expedientes.modal-crear');
    }
}
