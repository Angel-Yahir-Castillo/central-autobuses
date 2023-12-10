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
        $fechaCarbon = \Carbon\Carbon::createFromFormat('d-m-Y', $request->fecha);
        // Sumar un día
        $fechaSumada = $fechaCarbon->addDay();
        $fechaFormateada = $fechaSumada->format('d-m-Y');
        session(['fecha_llegada' => $fechaFormateada]);
        $chofer = Chofer::inRandomOrder()->first();
        return view('itinerario', compact('chofer'));
    }

    public function boletos(){
        return view('boletos');
    }
}
