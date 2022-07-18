<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Expediente;
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
        foreach ($diagnosticos as $diagnostico) {
            $diagnostico->delete();
        }
        $expediente->delete();
        return redirect()->route('expedientes.index');
    }
}
