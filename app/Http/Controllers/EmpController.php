<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;


class EmpController extends Controller
{
    public function pdfacturas(){

        $ListaFacturas = Factura::where('id_tenant','=',Auth::user()->id)->where('tipo','=','1')->get();

        return view('pdf-factura',compact('ListaFacturas'));


    } 



    public function descargarPDF(){

        $ListaFacturas = Factura::where('id_tenant','=',Auth::user()->id)->where('tipo','=','1')->get();

        $pdf = PDF::loadview('pdf-factura',compact('ListaFacturas'));
        
        return $pdf->download('Archivo.pdf');



    }
}