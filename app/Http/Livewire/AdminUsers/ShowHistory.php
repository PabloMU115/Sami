<?php

namespace App\Http\Livewire\AdminUsers;

use App\Models\History;
use Livewire\Component;

class ShowHistory extends Component
{
    public function render()
    {
        $tenants = History::paginate(5);
        return view('livewire.admin-users.show-history', compact('tenants'));
    }
}
