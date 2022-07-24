<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Expediente;
use App\Models\Factura;
use App\Models\Inventario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturasController extends Controller
{
    public function index()
    {

        $usuarios = Expediente::where('id_tenant', '=', Auth::user()->id)->where('tipo', '=', '1')->get();

        $inventario = Inventario::all();

        return view('Contenedorfactura', compact('usuarios', 'inventario'));
    }

    public function generarFactura(Request $request, $numeroFactura)
    {


        $paciente = Expediente::where('id_expediente', '=', $request->input('id_cliente'))->get()[0];

        $factura = new Factura();
        $factura['id_tenant'] = Auth::user()->id;
        $factura['id_cliente'] = $paciente->id_expediente;
        $factura['nombre_cliente'] = $paciente->nombre;

        $factura['numero_factura'] = $numeroFactura;

        $detalle = Detalle::where('numero_factura', '=', $numeroFactura)->get();

        $sumatotal = 0;

        foreach ($detalle as $item) {
            $sumatotal += $item->subtotal;
        }
        $factura['tipo'] = 1;
        $factura['total'] = $sumatotal;



        if ($sumatotal > 0) {
            $factura->save();

            return redirect()->route('listaFact');
        } elseif ($sumatotal == 0) {

            return back();
        }
    }


    public function mostrarFacturas()
    {



        $ListaFacturas = Factura::where('id_tenant', '=', Auth::user()->id)->where('tipo','=','1')->get();

        return view('ListaFacturas', compact('ListaFacturas'));
    }


    public function vistaFacturas()
    {


        $ListaFacturas = Factura::where('id_tenant', '=', Auth::user()->id)->where('tipo','=','1')->get();



        return view('ListaFacturas', compact('ListaFacturas'));
    }
}
