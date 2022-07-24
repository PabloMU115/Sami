<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAgenda extends Component
{
    public $fecha, $descripcion="Ninguna";

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function mount()
    {
        $this->fecha = date('Y-m-d');
    }

    protected $rules = [
        'fecha' => 'required'
    ];

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        Agenda::create([
            'id_recordatorio' => $data,
            'id_tenant' => Auth::id(),
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
        ]);
        $this->reset(['descripcion']);
        $this->emit('render');
    }

    
    public function render()
    {
        return view('livewire.agenda.create-agenda');
    }
}
