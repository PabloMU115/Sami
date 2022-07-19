<?php

namespace App\Http\Livewire\Recetas;

use App\Models\Receta;
use Livewire\Component;

class EditReceta extends Component
{

    public $receta, $indicaciones, $nombre_medico;

    public function mount(Receta $receta)
    {
        $this->receta = $receta;
        $this->nombre_medico = $receta->nombre_medico;
        $this->indicaciones = $receta->indicaciones;
    }

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $this->receta->update([
            'indicaciones' => $this->indicaciones,
            'nombre_medico' => $this->nombre_medico,
        ]);
        $this->emit('render');
    }

    protected $rules = [
        'nombre_medico' => 'required|max:30|min:1',
        'indicaciones' => 'required|max:200'
    ];

    public function render()
    {
        return view('livewire.recetas.edit-receta');
    }
} 
