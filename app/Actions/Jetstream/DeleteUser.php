<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use App\Models\Expediente;
use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Receta;
use App\Models\Inventario;

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
        // Expediente::where('id_tenant','=',$user->id)->deleteK();
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
