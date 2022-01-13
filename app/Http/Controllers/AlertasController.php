<?php

namespace App\Http\Controllers;

use App\Models\alertas;
use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;
use App\Models\temperatura;
use App\Models\variador;

class AlertasController extends Controller
{
    public function alertas(Request $request)
    {
        //asignamos fechas
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $fi1 = $request->fecha_ini1 . ' 00:00:00';
        $ff1 = $request->fecha_fin1 . ' 23:59:59';
        //mandamos a llamar a la tabla junto con las fechas
        $tabla1 = $request->slcm1;
        // dd($tabla);
        if ($tabla1 == "temperatura1") {
            $otrasv = temperatura::whereBetween('created_at', [$fi1, $ff1])->limit(5)->get();
        } else if($tabla1 == "vibracion1"){
            $otrasv = grafica_ejes::whereBetween('created_at', [$fi1, $ff1])->limit(5)->get();
        } else if($tabla1 == "gfases" || $tabla1 == "gfye" || $tabla1 == "gpotencias"){
            $otrasv = variador::whereBetween('created_at', [$fi1, $ff1])->limit(5)->get();
        } else{
            $otrasv = variador::whereBetween('created_at', [$fi1, $ff1])->limit(5)->get();
        }
        $tabla = $request->slcm;
        
        if ($tabla == "temperatura") {
            $alertas = alertas::where('tabla', '=', 'temperatura')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        } else {
            $alertas = alertas::where('tabla', '=', 'vibracion')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        }
        return view('content.alertas')
        ->with(['alertas' => $alertas])
        ->with(['tabla1' => $tabla1])
        ->with(['otrasv' => $otrasv]);
    }

    public function alertashow()
    {
        //Mandamos a llamar los ultimos 4 registros
        $alertas = DB::select("SELECT TOP 4 * FROM dbo.alertas ORDER BY ID DESC");
        return response()->json(
            $alertas
        );
    }

    public function Horarios()
    {
        return view('content.horario_alertas');
    }

    public function guardar_horas(Request $request)
    {
        $id = (session('session_id'));
        $update = DB::insert("UPDATE [dbo].[horario_alertas] SET h_ini = '$request->hi', h_fin = '$request->hf' WHERE user_id = '$id'");
        return redirect()->back();
    }
    public function guardar_dias(Request $request)
    {
        $id = (session('session_id'));
        $update = DB::insert("UPDATE [dbo].[horario_alertas] SET lun = '$request->lun',mar = '$request->mar',mier = '$request->mier',jue = '$request->jue',vier = '$request->vier',sab = '$request->sab',dom = '$request->dom' WHERE user_id = '$id'");
        return redirect()->back();
    }
    public function status_alertas(Request $request)
    {
        $id = (session('session_id'));
        $update = DB::insert("UPDATE [dbo].[horario_alertas] SET st = '$request->st' WHERE user_id = '$id'");
        return redirect()->back();
    }
}
