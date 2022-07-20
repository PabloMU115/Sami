<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function crear()
    {
        return view('auth.registerAdmin');
    }

    public function store(request $input)
    {
        $input->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make(strtolower($input['name'])),
            'type' => '2',
            'active' => '0',
            'inicio_sub' => date('y/m/d'),
            'vencimiento_sub' => date('y/m/d'),
        ])->assignRole('admin');
        return redirect()->route('admin.crear');
    }

    public function actualizar()
    {
        return view('modulos.actualizarPago');
    }

    public function update(Request $usuario)
    {
        User::where('id', '=', $usuario->id)->update([
            'active' => '1',
            'inicio_sub' => date('y/m/d'),
            'vencimiento_sub' => date('y/m/d', strtotime(' + 30 days')),
        ]);
        return redirect()->route('admin.index',);
    }
}
