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

    public function indexFiltrado(Request $request){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        $citas = Cita::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return view('modulos.citas.indexFiltrado', compact('citas'),compact('expedientes'));
    }

    public function indexFiltrado2(String $request){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request)->paginate();
        $citas = Cita::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request)->paginate();
        return view('modulos.citas.indexFiltrado', compact('citas'),compact('expedientes'));
    }

    public function create(Request $request) {
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return view('modulos.citas.create', compact('expedientes'));
     }

    public function store(Request $request){

        $request->validate([
            'nombre_medico'=>'required|max:30|min:1',
            'fecha'=>'required'
        ]);

        $cita = new Cita();
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        $datos = $request->all();
        $datos['id_cita'] = $data;
        $datos['id_tenant']=Auth::id();
        $cita = Cita::create($datos);
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return redirect()->route('citas.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
    }

    public function show(Cita $cita){
        return view('modulos.citas.show',compact('cita'));
    }
    
    public function edit(Request $request, Cita $cita){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return view('modulos.citas.edit',compact('cita'), compact('expedientes'));
    }

    public function update(Request $request, Cita $cita){

        $request->validate([
            'nombre_medico'=>'required|max:30|min:1',
            'fecha'=>'required'
        ]);

        $cita->update($request->all());
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return redirect()->route('citas.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
    }

    public function destroy(Cita $cita, Request $request){
        $cita->delete();
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->where('id_expediente','=',$request->id_expediente)->paginate();
        return redirect()->route('citas.indexFiltrado2',['id' => $expedientes[0]->id_expediente]);
    }
}
