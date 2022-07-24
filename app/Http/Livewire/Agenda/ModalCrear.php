<?php

namespace App\Http\Livewire\Agenda;

use LivewireUI\Modal\ModalComponent;

class ModalCrear extends ModalComponent
{

    protected $listeners = ['cerrar' => 'closeModal'];
    
    public function render()
    {
        return view('livewire.agenda.modal-crear');
    }
}
