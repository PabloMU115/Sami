<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use LivewireUI\Modal\ModalComponent;

class ModalEditar extends ModalComponent
{
    
    public $agenda;

    public function mount(Agenda $agenda)
    {        
        $this->agenda = $agenda;
    }

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.agenda.modal-editar');
    }
}
