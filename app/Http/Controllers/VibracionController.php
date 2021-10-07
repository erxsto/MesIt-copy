<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class VibracionController extends Controller
{
    public function index()
    {
        $query = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez FROM dbo.grafica_ejes ORDER BY id DESC');
        return view('content.vibracion', ['grafica' => $query]);
    }
    public function datavibracion()
    {
        $graficas = grafica_ejes::latest()->take(30)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');
        $datay = $graficas->pluck('ejey');
        $dataz = $graficas->pluck('ejez');
        return response()->json(compact('labels', 'data', 'datay', 'dataz'));
    }
    public function dataalertv(){

 $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');
        return response()->json(compact('labels', 'data'));
        
    }
}
