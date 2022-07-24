<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function verTenants()
    {
        return view('modulos.verTenants');
    }

    public function verHistorial()
    {
        return view('modulos.verHistorial');
    }

    public function verHistorialFacturas()
    {
        return view('modulos.historialFacturas');
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
        Factura::create([ 
			'id_tenant' => Auth::user()->id,
			'id_cliente' => Auth::user()->id,
			'nombre_cliente' => $usuario->Propietario,
			'numero_factura' => substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3),
			'total' => 45,
			'tipo' => "2"
        ]);
        return redirect()->route('admin.index',);
    }
}
