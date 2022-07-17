<?php

namespace App\Http\Livewire\Expedientes;

use Livewire\Component;
use App\Models\Expediente;

class EditExpediente extends Component
{
    
    public $cedula, $nombre, $apellidos, $edad, $alergias, $genero, $tipo_sangre, $actualizar;

    public function mount(Expediente $expediente)
    {        
        $this->actualizar = $expediente;
        $this->cedula = $expediente->cedula;
        $this->nombre = $expediente->nombre;
        $this->apellidos = $expediente->apellidos;
        $this->edad = $expediente->edad;
        $this->alergias = $expediente->alergias;
        $this->genero = $expediente->genero;
        $this->tipo_sangre = $expediente->tipo_sangre;
    }

    protected $rules = [
        'nombre'=>'required|max:50|min:2',
        'apellidos'=>'required|max:50|min:2',
        'alergias'=>'required|max:50'
    ];

    public function cerrar(){
        $this->emit('cerrar');
    }

    public function save(){
        $this->validate();
        $this->emit('cerrar');
        $this->actualizar->update([
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'edad' => $this->edad,
            'alergias' => $this->alergias,
            'genero' => $this->genero,
            'tipo_sangre' => $this->tipo_sangre,
        ]);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.expedientes.edit-expediente');
    }
}
