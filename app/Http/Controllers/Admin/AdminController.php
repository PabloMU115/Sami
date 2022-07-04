<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function crear(){
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
        ])->assignRole('admin');
        return redirect()->route('admin.crear');
    }
}
