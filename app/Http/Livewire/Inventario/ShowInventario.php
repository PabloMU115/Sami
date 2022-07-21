<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Inventario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowInventario extends Component
{
    use WithPagination;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $inventario = Inventario::where("id_tenant",'=',Auth::id())->paginate(6);
        return view('livewire.inventario.show-inventario', compact('inventario'));
    }
}
