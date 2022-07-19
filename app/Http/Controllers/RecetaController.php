<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Receta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{
    Public function index(){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->paginate();
        return view('modulos.recetas.index', compact('expedientes'));
}

public function show(Receta $receta){
    return view('modulos.recetas.show',compact('receta'));
}

public function destroy(Receta $receta){
    $receta->delete();
    return redirect()->route('recetas.index');
}
}
