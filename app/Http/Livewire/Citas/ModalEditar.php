<?php

namespace App\Http\Livewire\Citas;

use App\Models\Cita;
use LivewireUI\Modal\ModalComponent;

class ModalEditar extends ModalComponent
{

    public $cita;

    public function mount(Cita $cita)
    {
        $this->cita = $cita;
    }

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.citas.modal-editar');
    }
}
