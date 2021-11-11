<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\variador;

class EnergiaController extends Controller
{
    public function index(Request $request)
    {
        //Asignamos fecha inicial y final concatenando la hora
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        //Mandamos a llamar a la tabla variador-created_at, solo 5 registros.
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.energia')
            ->with(['graficas' => $graficas]);
    }


    public function dataenergia()
    {
        //Mandamos a llamar a la tabla variador
        $energia = \DB::select('SELECT TOP 1 * FROM variador ORDER BY id DESC');
        return response()->json(
            $energia
        );
    }
    public function grafs()
    {
        //Mandamos a llamar a la tabla variador solo los 10 registros
        $energias = \DB::select('select top 10 * from variador order by id desc');
        return response()->json(

            $energias
        );
    }

    public function gfases(Request $request)
    {
        //obtenemos la variable fecha y concatenamos la hora
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gfases')
            ->with(['graficas' => $graficas]);
    }

    public function gvolts(Request $request)
    {

        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gvolts')
            ->with(['graficas' => $graficas]);
    }

    public function gpotencias(Request $request)
    {

        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gpotencias')
            ->with(['graficas' => $graficas]);
    }

    public function gfye(Request $request)
    {

        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.graf.gfye')
            ->with(['graficas' => $graficas]);
    }
}
