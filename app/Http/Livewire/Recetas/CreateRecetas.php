<?php

namespace App\Http\Livewire\Recetas;

use App\Models\Receta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRecetas extends Component
{

    public $id_exp, $nombre_medico, $indicaciones = "Ninguna";

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function mount(String $id_exp)
    {
        $this->id_exp = $id_exp;
    }

    protected $rules = [
        'nombre_medico' => 'required|max:50|min:1',
        'indicaciones' => 'required|max:200'
    ];

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        Receta::create([
            'id_receta' => $data,
            'id_tenant' => Auth::id(),
            'id_expediente' => $this->id_exp,
            'nombre_medico' => $this->nombre_medico,
            'indicaciones' => $this->indicaciones,
            'fecha_emision' => date('Y-m-d'),
        ]);
        $this->reset(['nombre_medico']);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.recetas.create-recetas');
    } 
}
