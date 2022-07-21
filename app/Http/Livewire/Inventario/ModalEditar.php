<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario;
use LivewireUI\Modal\ModalComponent;

class ModalEditar extends ModalComponent
{

    public $inventario;

    public function mount(Inventario $inventario)
    {        
        $this->inventario = $inventario;
    }

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.inventario.modal-editar');
    }
}
