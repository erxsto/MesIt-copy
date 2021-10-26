<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorreoController extends Controller
{
    public function correo_alerta(){

        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $alertas = grafica_ejes::whereBetween('created_at', [$fi, $ff])->limit(5)->get();

        return view('content.correo_alerta')
            ->with(['alertas' => $alertas]);
            
    }
}
