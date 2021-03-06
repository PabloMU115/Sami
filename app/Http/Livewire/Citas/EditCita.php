<?php

namespace App\Http\Livewire\Citas;

use App\Models\Cita;
use Livewire\Component;

class EditCita extends Component
{

    public $cita, $fecha, $nombre_medico, $descripcion;

    public function mount(Cita $cita)
    {
        $this->cita = $cita;
        $this->nombre_medico = $cita->nombre_medico;
        $this->fecha = $cita->fecha;
        $this->descripcion = $cita->descripcion;
    }

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $this->cita->update([
            'fecha' => $this->fecha,
            'nombre_medico' => $this->nombre_medico,
            'descripcion' => $this->descripcion,
        ]);
        $this->emit('render');
    }

    protected $rules = [
        'fecha' => 'required',
        'nombre_medico' => 'required|max:50|min:3',
        'descripcion' => 'max:200'
    ];

    public function render()
    {
        return view('livewire.citas.edit-cita');
    }
}
