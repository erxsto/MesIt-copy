<?php

namespace App\Http\Controllers;

use App\Models\alertas;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AlertasController extends Controller
{
    public function alertas(Request $request)
    {
        //asignamos fechas
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        //mandamos a llamar a la tabla junto con las fechas
        $tabla = $request->slcm;
        $alertas = alertas::whereBetween('created_at', [$fi, $ff])->limit(30)->get();
        return view('content.alertas')
            ->with(['alertas' => $alertas,'tabla' => $tabla]);
    }

    public function alertashow()
    {
        //Mandamos a llamar los ultimos 4 registros
        $alertas = DB::select("SELECT TOP 4 * FROM dbo.alertas ORDER BY ID DESC");
        return response()->json(
            $alertas
        );
    }

    public function Horarios(){
        return view('content.horario_alertas');
    }

    public function guardar_horas(Request $request)
    {
        $id= (session('session_id'));
        $update = DB::insert("UPDATE [dbo].[horario_alertas] SET h_ini = '$request->hi', h_fin = '$request->hf' WHERE user_id = '$id'");
        return redirect()->back();
    }
    public function guardar_dias(Request $request)
    {
        $id= (session('session_id'));
        $update = DB::insert("UPDATE [dbo].[horario_alertas] SET lun = '$request->lun',mar = '$request->mar',mier = '$request->mier',jue = '$request->jue',vier = '$request->vier',sab = '$request->sab',dom = '$request->dom' WHERE user_id = '$id'");
        return redirect()->back();
    }
    public function status_alertas(Request $request)
    {
        $id= (session('session_id'));
        $update = DB::insert("UPDATE [dbo].[horario_alertas] SET status = '$request->data' WHERE user_id = '$id'");
        return redirect()->back();
    }

}
