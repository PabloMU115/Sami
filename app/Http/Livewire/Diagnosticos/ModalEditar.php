<?php

namespace App\Http\Livewire\Diagnosticos;

use App\Models\Diagnostico;
use LivewireUI\Modal\ModalComponent;

class ModalEditar extends ModalComponent
{

    public $diagnostico;

    public function mount(Diagnostico $diagnostico)
    {
        $this->diagnostico = $diagnostico;
    }

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.diagnosticos.modal-editar');
    }
}
