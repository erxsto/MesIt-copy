<?php

namespace App\Http\Controllers;
use App\Models\alertas;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class AlertasController extends Controller
{
    public function alertas(Request $request){

        $fi = $request->fecha_ini;
        $ff = $request->fecha_fin;
        $fii= Carbon::parse($fi)->format('d/m/Y');
        $fff= Carbon::parse($ff)->format('d/m/Y');
        $alertas = DB::select("SELECT * FROM dbo.alertas where created_at between convert(datetime,'$fii') and convert(datetime,'$fff')");
     
        return view('content.alertas')
            ->with(['alertas' => $alertas]);
            
    }
}
