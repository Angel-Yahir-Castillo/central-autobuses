<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chofer;

class BoletosController extends Controller
{
    //

    public function buscar(Request $request){
        session(['origen' => $request->origen]);
        session(['destino' => $request->destino]);
        session(['fecha' => $request->fecha]);
        session(['ninos' => $request->ninos]);
        session(['adultos' => $request->adultos]);
        $chofer = Chofer::inRandomOrder()->first();
        return view('itinerario', compact('chofer'));
    }

    public function boletos(){
        return view('boletos');
    }
}
