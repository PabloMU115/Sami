<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostico;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;

class DiagnosticoController extends Controller
{
    public function index(){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->paginate();
        return view('modulos.diagnosticos.index', compact('expedientes'));
    }
    
    public function show(Diagnostico $diagnostico){
        return view('modulos.diagnosticos.show',compact('diagnostico'));
    }

    public function destroy(Diagnostico $diagnostico){
        $diagnostico->delete();
        return redirect()->route('diagnosticos.index');
    }
}
