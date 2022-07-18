<?php

namespace App\Http\Livewire\Citas;

use LivewireUI\Modal\ModalComponent;

class ModalCrear extends ModalComponent
{

    protected $listeners = ['cerrar' => 'closeModal'];

    public $id_exp;

    public function mount(String $id_exp)
    {
        $this->id_exp = $id_exp;
    }

    public function render()
    {
        return view('livewire.citas.modal-crear');
    }
}
