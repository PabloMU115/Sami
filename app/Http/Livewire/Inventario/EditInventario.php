<?php

namespace App\Http\Livewire\Inventario;

use Livewire\Component;
use App\Models\Inventario;

class EditInventario extends Component
{
    public $proveedor, $nombre_producto, $cantidad, $precio, $tipo, $descripcion;

    public function mount(Inventario $inventario)
    {
        $this->actualizar = $inventario;
        $this->proveedor = $inventario->proveedor;
        $this->nombre_producto = $inventario->nombre_producto;
        $this->cantidad = $inventario->cantidad;
        $this->precio = $inventario->precio;
        $this->tipo = $inventario->tipo;
        $this->descripcion = $inventario->descripcion;
    }

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
        $this->actualizar->update([
            'nombre_producto' => $this->nombre_producto,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'tipo' => $this->tipo,
            'descripcion' => $this->descripcion,
        ]);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.inventario.edit-inventario');
    }
}
