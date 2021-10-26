<?php

namespace App\Http\Controllers;
use App\Models\alertas;
use Illuminate\Http\Request;

class CorreoController extends Controller
{
    public function correo_alerta(Request $request){

        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $alertas = alertas::whereBetween('created_at', [$fi, $ff])->get();

        return view('content.correo_alerta')
            ->with(['alertas' => $alertas]);
            
    }
}
