<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class VibracionController extends Controller
{
    public function vibracion()
    {
        $query = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez FROM dbo.grafica_ejes ORDER BY id DESC');
        return view('content.vibracion', ['grafica'=>$query]);
    }
    public function datavibracion()
    {
        $graficas = grafica_ejes::take(1)->get()->sortByDesc('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex', 'ejey', 'ejez');
        return response()->json(compact('labels', 'data')); 
    }
}
