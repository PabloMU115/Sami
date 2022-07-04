<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    public function index(){
        $expedientes = Expediente::where('id_tenant','=',Auth::id())->paginate();
        return view('modulos.expedientes.index', compact('expedientes'));
    }

    public function create() {
        return view('modulos.expedientes.create');
    }

    public function store(Request $request){

        $request->validate([
            'cedula'=>'required|max:12|min:12',
            'nombre'=>'required|max:50|min:2',
            'apellidos'=>'required|max:50|min:2',
            'edad'=>'required|max:3|min:1',
            'alergias'=>'required|max:50'
        ]);

        $expediente = new Expediente();
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        $datos = $request->all();
        $datos['id_expediente'] = $data;
        $datos['id_tenant']=Auth::id();
        $expediente = Expediente::create($datos);
        return redirect()->route('expedientes.show',$data);
    }

    public function show(Expediente $expediente){
        return view('modulos.expedientes.show',compact('expediente'));
    }
    
    public function edit(Expediente $expediente){
        return view('modulos.expedientes.edit',compact('expediente'));
    }

    public function update(Request $request, Expediente $expediente){

        $request->validate([
            'nombre'=>'required|max:50|min:2',
            'apellidos'=>'required|max:50|min:2',
            'edad'=>'required|max:3|min:1',
            'alergias'=>'required|max:50'
        ]);

        $expediente->update($request->all());
        return redirect()->route('expedientes.show',$expediente->id_expediente);
    }

    public function destroy(Expediente $expediente){
        $expediente->delete();
        return redirect()->route('expedientes.index');
    }
}
