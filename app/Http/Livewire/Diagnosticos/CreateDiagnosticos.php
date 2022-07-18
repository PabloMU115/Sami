<?php

namespace App\Http\Livewire\Diagnosticos;

use App\Models\Diagnostico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateDiagnosticos extends Component
{

    public $id_exp, $categoria = "Sin Categoria", $nombre_medico, $descripcion = "Ninguna";

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function mount(String $id_exp)
    {
        $this->id_exp = $id_exp;
    }

    protected $rules = [
        'descripcion' => 'max:200',
        'categoria' => 'required|max:30',
        'nombre_medico' => 'required|max:50|min:3'
    ];

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        Diagnostico::create([
            'id_diagnostico' => $data,
            'id_tenant' => Auth::id(),
            'id_expediente' => $this->id_exp,
            'categoria' => $this->categoria,
            'nombre_medico' => $this->nombre_medico,
            'fecha_emision' => date('y/m/d'),
            'descripcion' => $this->descripcion,
        ]);
        $this->reset(['categoria', 'nombre_medico', 'descripcion']);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.diagnosticos.create-diagnosticos');
    }
}
