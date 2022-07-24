<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use Livewire\Component;

class EditAgenda extends Component
{
    public $agenda, $fecha, $descripcion;

    public function mount(Agenda $agenda)
    {
        $this->agenda = $agenda;
        $this->fecha = $agenda->fecha;
        $this->descripcion = $agenda->descripcion;
    }

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $this->agenda->update([
            'fecha' => $this->fecha,
            'descripcion' => $this->descripcion,
        ]);
        $this->emit('render');
    }

    protected $rules = [
        'fecha' => 'required',
        'descripcion' => 'max:200'
    ];

    public function render()
    {
        return view('livewire.agenda.edit-agenda');
    }
}
