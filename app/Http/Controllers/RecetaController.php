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

public function indexFiltrado(Request $request){
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    $recetas = Receta::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    return view('modulos.recetas.indexFiltrado', compact('recetas'),compact('expedientes'));
}

public function indexFiltrado2(String $request){
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request)->paginate();
    $recetas = Receta::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request)->paginate();
    return view('modulos.recetas.indexFiltrado', compact('recetas'),compact('expedientes'));
}

public function create(Request $request) {
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    return view('modulos.recetas.create', compact('expedientes'));
 }

public function store(Request $request){

    $request->validate([
        'indicaciones'=>'required|max:200',
        'nombre_medico'=>'required|max:30|min:3'
    ]);

    $receta = new Receta();
    $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
    $datos = $request->all();
    $datos['id_receta'] = $data;
    $datos['id_tenant']=Auth::id();
    $datos['fecha_emision']=date('y/m/d');
    $receta = Receta::create($datos);
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    return redirect()->route('recetas.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
}

public function show(Receta $receta){
    return view('modulos.recetas.show',compact('receta'));
}

public function edit(Request $request, Receta $receta){
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    return view('modulos.recetas.edit',compact('receta'), compact('expedientes'));
}

public function update(Request $request, Receta $receta){

    $request->validate([
        'indicaciones'=>'required|max:200',
        'nombre_medico'=>'required|max:30|min:1'
    ]);

    $receta->update($request->all());
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    return redirect()->route('recetas.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
}

public function destroy(Receta $receta, Request $request){
    $receta->delete();
    $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
    return redirect()->route('recetas.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
}
}
