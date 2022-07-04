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

    public function indexFiltrado(Request $request){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        $diagnosticos = Diagnostico::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return view('modulos.diagnosticos.indexFiltrado', compact('diagnosticos'),compact('expedientes'));
    }

    public function indexFiltrado2(String $request){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request)->paginate();
        $diagnosticos = Diagnostico::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request)->paginate();
        return view('modulos.diagnosticos.indexFiltrado', compact('diagnosticos'),compact('expedientes'));
    }

    public function create(Request $request) {
       $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
       return view('modulos.diagnosticos.create', compact('expedientes'));
    }

    public function store(Request $request){
        $request->validate([
            'descripcion'=>'max:200',
            'categoria'=>'required|max:20',
            'nombre_medico'=>'required|max:50|min:3'
        ]);

        $diagnostico = new Diagnostico();
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        $datos = $request->all();
        $datos['id_diagnostico'] = $data;
        $datos['id_tenant']=Auth::id();
        $datos['fecha_emision']=date('y/m/d');
        $diagnostico = Diagnostico::create($datos);
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return redirect()->route('diagnosticos.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
    }

    public function show(Diagnostico $diagnostico){
        return view('modulos.diagnosticos.show',compact('diagnostico'));
    }
    
    public function edit(Request $request, Diagnostico $diagnostico){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return view('modulos.diagnosticos.edit',compact('diagnostico'), compact('expedientes'));
    }

    public function update(Request $request, Diagnostico $diagnostico){

        $request->validate([
            'descripcion'=>'max:200',
            'categoria'=>'required|max:20',
            'nombre_medico'=>'required|max:50|min:3'
        ]);

        $diagnostico->update($request->all());
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return redirect()->route('diagnosticos.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
    }

    public function destroy(Diagnostico $diagnostico, Request $request){
        $diagnostico->delete();
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return redirect()->route('diagnosticos.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
    }
}
