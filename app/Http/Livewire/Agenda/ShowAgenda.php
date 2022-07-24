<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAgenda extends Component
{
    use WithPagination;

    public $search, $id_exp;

    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $agendas = Agenda::where("id_tenant",'=',Auth::id())->orderBy('fecha','ASC')->paginate(4);
        return view('livewire.agenda.show-agenda', compact('agendas'));
    }
}
