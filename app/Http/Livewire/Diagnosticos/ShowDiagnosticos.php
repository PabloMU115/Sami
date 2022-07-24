<?php

namespace App\Http\Livewire\Diagnosticos;

use App\Models\Diagnostico;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDiagnosticos extends Component
{
    use WithPagination;

    public $search, $id_exp;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $expedientes = Expediente::where("id_tenant",'=',Auth::id())->orderBy('tipo', 'DESC')->get();
        if(sizeof($expedientes) > 0){
            $this->id_exp = Expediente::where('id_tenant','like','%'.Auth::id().'%')->orderBy('tipo', 'DESC')->get()[0]->id_expediente;
        }
    }

    public function render()
    {
        $expedientes = Expediente::where("id_tenant",'=',Auth::id())->orderBy('tipo', 'DESC')->get();
        $diagnosticos = Diagnostico::where("id_tenant",'=',Auth::id())->where("id_expediente",'=',$this->id_exp)->paginate(4);
        return view('livewire.diagnosticos.show-diagnosticos', compact('expedientes'), compact('diagnosticos'));
    }
}
