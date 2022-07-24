<?php

namespace App\Http\Livewire\Citas;

use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCitas extends Component
{

    public $id_exp, $nombre_medico, $fecha, $descripcion="Ninguna";

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function mount(String $id_exp)
    {
        $this->id_exp = $id_exp;
        $this->fecha = date('Y-m-d');
    }

    protected $rules = [
        'nombre_medico' => 'required|max:50|min:1',
        'fecha' => 'required'
    ];

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        Cita::create([
            'id_cita' => $data,
            'id_tenant' => Auth::id(),
            'id_expediente' => $this->id_exp,
            'descripcion' => $this->descripcion,
            'nombre_medico' => $this->nombre_medico,
            'fecha' => $this->fecha,
        ]);
        $this->reset(['nombre_medico','descripcion']);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.citas.create-citas');
    }
}
