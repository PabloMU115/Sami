<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
    public function index(){
        $inventario = Inventario::where('id_tenant','=',Auth::id())->paginate();
        return view('modulos.inventario.index', compact('inventario'));
    }

    public function create() {
        return view('modulos.inventario.create');
    }

    public function store(Request $request){

        $request->validate([
            'nombre_producto'=>'required|max:40|min:3',
            'proveedor'=>'required|max:20',
            'cantidad'=>'required|max:6',
            'precio'=>'required|max:6',
            'tipo'=>'required',
            'descripcion'=>'max:200'
        ]);

        $inventario = new Inventario();
        $data = substr(str_shuffle("1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz"), 1, 3);
        $datos = $request->all();
        $datos['id_producto'] = $data;
        $datos['id_tenant']=Auth::id();
        $inventario = Inventario::create($datos);
        return redirect()->route('inventario.show',$data);
    }

    public function show(Inventario $inventario){
        return view('modulos.inventario.show',compact('inventario'));
    }
    
    public function edit(Inventario $inventario){
        return view('modulos.inventario.edit',compact('inventario'));
    }

    public function update(Request $request, Inventario $inventario){

        $request->validate([
            'nombre_producto'=>'required|max:40|min:3',
            'proveedor'=>'required|max:20',
            'cantidad'=>'required|max:6',
            'precio'=>'required|max:6',
            'tipo'=>'required',
            'descripcion'=>'required|max:200'
        ]);

        $inventario->update($request->all());
        return redirect()->route('inventario.show',$inventario->id_producto);
    }

    public function destroy(Inventario $inventario){
        $inventario->delete();
        return redirect()->route('inventario.index');
    }
}
