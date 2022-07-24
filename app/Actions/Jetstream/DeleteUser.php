<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use App\Models\Expediente;
use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Factura;
use App\Models\Receta;
use App\Models\History;
use App\Models\Inventario;
use Illuminate\Support\Facades\Auth;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $diagnosticos = Diagnostico::where('id_tenant','=',Auth::id())->get();
        $facturas = Factura::where('id_tenant','=',Auth::id())->where('tipo','=','1')->get();
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->get();
        $citas = Cita::where('id_tenant','=',Auth::id())->get();
        $recetas = Receta::where('id_tenant','=',Auth::id())->get();
        $productos = Inventario::where('id_tenant','=',Auth::id())->get();
        foreach ($diagnosticos as $diagnostico) {
            $diagnostico->delete();
        }
        foreach ($citas as $cita) {
            $cita->delete();
        }
        foreach ($recetas as $receta) {
            $receta->delete();
        }
        foreach ($expedientes as $expediente) {
            $expediente->delete();
        }
        foreach ($productos as $producto) {
            $producto->delete();
        }
        foreach ($facturas as $factura) {
            $factura->delete();
        }
        if ($user->type=1) {
            History::create([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'type' => $user->type,
                'deleted_at' => date('y/m/d'),
            ]);
            $user->delete();
        } else {
            $user->delete();
        }
        
    }
}
