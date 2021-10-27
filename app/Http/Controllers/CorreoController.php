<?php

namespace App\Http\Controllers;
use App\Models\alertas;
use Illuminate\Http\Request;

use Carbon\Carbon;
class CorreoController extends Controller
{
    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
    public function correo_alerta(Request $request){

        $fi = $request->fecha_ini;
        $ff = $request->fecha_fin;
        $fii= Carbon::parse($fi)->format('d/m/Y');
        $fff= Carbon::parse($ff)->format('d/m/Y');
        $alertas = \DB::select("SELECT * FROM dbo.alertas where created_at between convert(datetime,'$fii') and convert(datetime,'$fff')");
     
        return view('content.correo_alerta')
            ->with(['alertas' => $alertas]);
            
    }
}
