<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Expediente;
use App\Models\Receta;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    public function index(){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->paginate();
        return view('modulos.expedientes.index', compact('expedientes'));
    }

    public function show(Expediente $expediente){
        return view('modulos.expedientes.show',compact('expediente'));
    }

    public function destroy(Expediente $expediente){
        $diagnosticos = Diagnostico::where('id_tenant','=',Auth::id())->where('id_expediente','=',$expediente->id_expediente)->get();
        $citas = Cita::where('id_tenant','=',Auth::id())->where('id_expediente','=',$expediente->id_expediente)->get();
        $recetas = Receta::where('id_tenant','=',Auth::id())->where('id_expediente','=',$expediente->id_expediente)->get();
        foreach ($diagnosticos as $diagnostico) {
            $diagnostico->delete();
        }
        foreach ($citas as $cita) {
            $cita->delete();
        }
        foreach ($recetas as $receta) {
            $receta->delete();
        }
        $expediente->delete();
        return redirect()->route('expedientes.index');
    }
}
