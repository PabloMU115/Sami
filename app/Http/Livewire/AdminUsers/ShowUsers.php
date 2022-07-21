<?php

namespace App\Http\Livewire\AdminUsers;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $tenants = User::where("type",'=',1)->paginate(5);
        return view('livewire.admin-users.show-users',compact('tenants'));
    }
}
