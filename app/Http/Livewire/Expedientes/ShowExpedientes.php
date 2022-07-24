<?php

namespace App\Http\Livewire\Expedientes;

use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
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
        $expedientes = Expediente::where("id_tenant",'=',Auth::id())->orderBy('tipo','DESC')->paginate(4);
        return view('livewire.expedientes.show-expedientes', compact('expedientes'));
    }
}
