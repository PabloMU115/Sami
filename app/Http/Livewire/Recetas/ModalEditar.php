<?php

namespace App\Http\Livewire\Recetas;

use App\Models\Receta;
use LivewireUI\Modal\ModalComponent;

class ModalEditar extends ModalComponent
{
    public $receta;

    public function mount(Receta $receta)
    {
        $this->receta = $receta;
    }

    protected $listeners = ['cerrar' => 'closeModal'];

    public function render()
    {
        return view('livewire.recetas.modal-editar');
    }
}
