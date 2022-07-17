<?php

namespace App\Http\Livewire\Expedientes;

use App\Models\Expediente;
use LivewireUI\Modal\ModalComponent;

class ModalEditar extends ModalComponent
{

    public $expedientes;

    public function mount(Expediente $expediente)
    {        
        $this->expedientes = $expediente;
    }

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.expedientes.modal-editar');
    }
}
