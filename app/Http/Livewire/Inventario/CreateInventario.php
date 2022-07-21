<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateInventario extends Component
{
    public $proveedor, $nombre_producto, $cantidad = 0, $precio = 0, $tipo = 0, $descripcion = "Ninguna";

    protected $rules = [
        'nombre_producto' => 'required|max:40|min:3',
        'proveedor' => 'required|max:20',
        'cantidad' => 'required|max:6',
        'precio' => 'required|max:6',
        'tipo' => 'required',
        'descripcion' => 'max:200'
    ];

    public function cerrar()
    {
        $this->emit('cerrar');
    }

    public function save()
    {
        $this->validate();
        $this->emit('cerrar');
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        Inventario::create([
            'id_producto' => $data,
            'id_tenant' => Auth::id(),
            'proveedor' => $this->proveedor,
            'nombre_producto' => $this->nombre_producto,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'tipo' => $this->tipo,
            'descripcion' => $this->descripcion,
        ]);
        $this->reset(['proveedor', 'nombre_producto', 'cantidad', 'precio', 'tipo', 'descripcion']);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.inventario.create-inventario');
    }
}
