<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function index(){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->paginate();
        return view('modulos.citas.index', compact('expedientes'));
    }

    public function show(Cita $cita){
        return view('modulos.citas.show',compact('cita'));
    }

    public function destroy(Cita $cita){
        $cita->delete();
        return redirect()->route('citas.index');
    }
}
