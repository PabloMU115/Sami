<?php

namespace App\Http\Livewire\Expedientes;

use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateExpedientes extends Component
{

    public $cedula, $nombre, $apellidos, $edad=0, $alergias="Ninguna", $genero="M", $tipo_sangre="A+";

    protected $rules = [
        'cedula'=>'required|max:12|min:12',
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
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        Expediente::create([
            'id_expediente' => $data,
            'id_tenant' => Auth::id(),
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'edad' => $this->edad,
            'alergias' => $this->alergias,
            'genero' => $this->genero,
            'tipo_sangre' => $this->tipo_sangre,
        ]);
        $this->reset(['cedula', 'nombre', 'apellidos', 'alergias', 'edad', 'genero', 'tipo_sangre']);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.expedientes.create-expedientes');
    }
}
