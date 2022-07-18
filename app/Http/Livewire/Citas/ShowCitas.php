<?php

namespace App\Http\Livewire\Citas;

use App\Models\Cita;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCitas extends Component
{
    use WithPagination;

    public $search, $id_exp, $cant=0;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $this->id_exp = Expediente::where("id_tenant",'=',Auth::id())->orderBy('id_expediente', 'DESC')->get()[0]->id_expediente;
    }

    public function render()
    {
        $expedientes = Expediente::where("id_tenant",'=',Auth::id())->orderBy('id_expediente', 'DESC')->get();
        $citas = Cita::orWhere('nombre_medico','like','%'.$this->search.'%')
        ->orWhere('fecha','like','%'.$this->search.'%')->paginate(5);
        $this->cant=0;
        return view('livewire.citas.show-citas', compact('expedientes'), compact('citas'));
    }
}
