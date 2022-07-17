<?php

namespace App\Http\Livewire\Expedientes;

use App\Models\Expediente;
use Livewire\Component;
use Livewire\WithPagination;

class ShowExpedientes extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $expedientes = Expediente::where('cedula','like','%'.$this->search.'%')
        ->orWhere('nombre','like','%'.$this->search.'%')
        ->orWhere('apellidos','like','%'.$this->search.'%')
        ->orWhere('tipo_sangre','like','%'.$this->search.'%')
        ->orWhere('edad','like','%'.$this->search.'%')->orderBy('id_expediente', 'DESC')->paginate(5);
        return view('livewire.expedientes.show-expedientes', compact('expedientes'));
    }
}
