<?php

namespace App\Http\Livewire\Diagnosticos;

use App\Models\Diagnostico;
use Livewire\Component;

class EditDiagnostico extends Component
{

    public $diagnostico, $categoria, $nombre_medico, $descripcion;

    public function mount(Diagnostico $diagnostico)
    {
        $this->diagnostico = $diagnostico;
        $this->nombre_medico = $diagnostico->nombre_medico;
        $this->categoria = $diagnostico->categoria;
        $this->descripcion = $diagnostico->descripcion;
    }

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $this->diagnostico->update([
            'categoria' => $this->categoria,
            'nombre_medico' => $this->nombre_medico,
            'descripcion' => $this->descripcion,
        ]);
        $this->emit('render');
    }

    protected $rules = [
        'descripcion' => 'max:200',
        'categoria' => 'required|max:30',
        'nombre_medico' => 'required|max:50|min:3'
    ];

    public function render()
    {
        return view('livewire.diagnosticos.edit-diagnostico');
    }
}
