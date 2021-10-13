<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\temperatura;

class TemperaturaController extends Controller
{
    public function fecha(Request $request)
    {
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = temperatura::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.temperatura')
        ->with(['graficas' => $graficas]);
    }
    public function index(){
        $temps=DB::table('dbo.temperatura')->limit(5)
        ->get();
        return view('content.temperatura', ['grafica'=>$temps]);
    }

    public function datatemp(){


        $temps = \DB::select('select top 1 id , cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        return response()->json(
            $temps
        ); 
    }
    public function datacharttemp(){


        $charttemps = \DB::select('select top 10 id,cast((temp*1.8+32) as numeric(36,2)) far,cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        return response()->json(
            $charttemps
        ); 
    }
}
