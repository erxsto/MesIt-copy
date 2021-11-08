<?php

namespace App\Http\Controllers;

use App\Models\alertas;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AlertasController extends Controller
{
<<<<<<< HEAD
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
=======
    public function alertas(Request $request){
        $tabla = $request->get('slcm');

        $fi = $request->fecha_ini;
        $ff = $request->fecha_fin;
                
        $fii= Carbon::parse($fi)->format('d/m/Y');
        
        $fff= Carbon::parse($ff)->format('d/m/Y');
        
        $alertas = DB::select("SELECT TOP 10 * FROM dbo.alertas where tabla = '$tabla' and created_at between convert(datetime,'$fii') and convert(datetime,'$fff') ");


        return view('content.alertas')->with(compact('alertas','tabla'));
    }

            
    

    public function alertashow(){
>>>>>>> 4fdfcc563b72be95145d9b850413662a921e9c21
        $alertas = DB::select("SELECT TOP 4 * FROM dbo.alertas ORDER BY ID DESC");
        return response()->json(
            $alertas
        );
    }
}
