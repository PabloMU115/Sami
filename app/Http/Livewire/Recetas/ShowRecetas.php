<?php

namespace App\Http\Livewire\Recetas;

use App\Models\Receta;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRecetas extends Component
{
    use WithPagination;

    public $search, $id_exp;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $expedientes = Expediente::where("id_tenant",'=',Auth::id())->orderBy('id_expediente', 'DESC')->get();
        if(sizeof($expedientes) > 0){
            $this->id_exp = Expediente::where('id_tenant','like','%'.Auth::id().'%')->orderBy('id_expediente', 'DESC')->get()[0]->id_expediente;
        }
    }

    public function render()
    {
        $expedientes = Expediente::where("id_tenant",'=',Auth::id())->orderBy('id_expediente', 'DESC')->get();
        $recetas = receta::where("id_tenant",'=',Auth::id())->paginate(4);
        return view('livewire.recetas.show-recetas', compact('expedientes'), compact('recetas'));
    }
}
