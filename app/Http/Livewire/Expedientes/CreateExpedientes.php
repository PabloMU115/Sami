<?php

namespace App\Http\Livewire\Expedientes;

use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateExpedientes extends Component
{

    public $cedula, $nombre, $apellidos, $edad=0, $alergias="Ninguna", $genero="M", $tipo_sangre="A+";

    protected $rules = [
        'cedula'=>'required|max:10|min:10',
        'nombre'=>'required|max:50|min:3',
        'apellidos'=>'required|max:50|min:3',
        'alergias'=>'required|max:200'
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
            'tipo' => "1",
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
