<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index(){
        return view('modulos.agenda.index');
    }

    public function show(Agenda $agenda){
        return view('modulos.citas.show',compact('agenda'));
    }

    public function destroy(Agenda $agenda){
        $agenda->delete();
        return redirect()->route('agenda.index');
    }
}
