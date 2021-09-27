<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class VibracionController extends Controller
{
    public function vibracion()
    {
        $query=DB::table('dbo.grafica_ejes')->limit(5)
        ->get();
        return view('content.vibracion', ['grafica'=>$query]);
    }
    public function datavibracion()
    {
        // $grafica = DB::table('dbo.grafica_ejes')->latest()->take(30)->get()->sortBy('id');
        // $labels = $grafica->pluck('id');
        // $data = $grafica->pluck('ejex', 'ejey', 'ejez');
        // $ejex=DB::select('SELECT ejex FROM ( SELECT * FROM dbo.grafica_ejes ORDER BY id DESC LIMIT 20)');
        // return response()->json(compact('labels', 'data', 'ejex', 'ejey', 'ejez'));
        $graficas = \DB::select('SELECT TOP 1 * FROM  dbo.grafica_ejes ORDER BY  id DESC');
        return response()->json(
            $graficas
        ); 
    }
}
