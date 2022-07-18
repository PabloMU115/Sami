<?php

namespace App\Http\Livewire\Diagnosticos;

use App\Models\Diagnostico;
use App\Models\Expediente;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDiagnosticos extends Component
{
    use WithPagination;

    public $search, $id_exp, $cant=0;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $this->id_exp = Expediente::orderBy('id_expediente', 'DESC')->get()[0]->id_expediente;
    }

    public function render()
    {
        $expedientes = Expediente::orderBy('id_expediente', 'DESC')->get();
        $diagnosticos = Diagnostico::orWhere('nombre_medico','like','%'.$this->search.'%')
        ->orWhere('categoria','like','%'.$this->search.'%')
        ->orWhere('fecha_emision','like','%'.$this->search.'%')->paginate(5);
        $this->cant=0;
        return view('livewire.diagnosticos.show-diagnosticos', compact('expedientes'), compact('diagnosticos'));
    }
}
