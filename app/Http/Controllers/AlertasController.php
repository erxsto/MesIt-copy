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
        $fi = $request->fecha_ini;
        $ff = $request->fecha_fin;
        $fii = Carbon::parse($fi)->format('d/m/Y');
        $fff = Carbon::parse($ff)->format('d/m/Y');
        //mandamos a llamar a la tabla junto con las fechas
        $alertas = DB::select("SELECT * FROM dbo.alertas where created_at between convert(datetime,'$fii') and convert(datetime,'$fff')");

        return view('content.alertas')
            ->with(['alertas' => $alertas]);
    }

    public function alertashow()
    {
        //Mandamos a llamar los ultimos 4 registros
        $alertas = DB::select("SELECT TOP 4 * FROM dbo.alertas ORDER BY ID DESC");
        return response()->json(
            $alertas
        );
    }
}
