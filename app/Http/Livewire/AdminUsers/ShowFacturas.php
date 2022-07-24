<?php

namespace App\Http\Livewire\AdminUsers;

use App\Models\Factura;
use Livewire\Component;

class ShowFacturas extends Component
{
    public function render()
    {
        $facturas = Factura::where('tipo','=','2')->paginate(5);
        return view('livewire.admin-users.show-facturas',compact('facturas'));
    }
}
