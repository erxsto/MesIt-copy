<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\variador;

class EnergiaController extends Controller
{
    public function index(Request $request){

        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.energia')
        ->with(['graficas' => $graficas]);
    }

    
    public function dataenergia(){


        $energia = \DB::select('SELECT TOP 1 * FROM variador ORDER BY id DESC');
        return response()->json(
            $energia
        ); 
    }
    public function grafs(){


        $energias = \DB::select('select top 10 * from variador order by id desc');
        return response()->json(
            
            $energias
        ); 
    }

    public function gfases(Request $request){

        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gfases')
        ->with(['graficas' => $graficas]);
    }

    public function gvolts(Request $request){

        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gvolts')
        ->with(['graficas' => $graficas]);
    }

    public function gpotencias(Request $request){

        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gpotencias')
        ->with(['graficas' => $graficas]);
    }

    public function gfye(Request $request){

        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gfye')
        ->with(['graficas' => $graficas]);
    }
}
