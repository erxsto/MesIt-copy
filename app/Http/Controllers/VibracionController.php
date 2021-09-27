<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VibracionController extends Controller
{
    public function vibracion()
    {
        $query=DB::table('dbo.grafica_ejes')->limit(5)
        ->get();
        return view('content.vibracion', ['grafica'=>$query]);
    }
    public function index()
    {
        grafica_ejes::create(['ejex', 'ejey', 'ejez' => rand(30,70)]);
        $grafica = DB::latest()->take(30)->get()->sortBy('id');
        $labels = $grafica->pluck('id');
        $data = $grafica->pluck('ejex', 'ejey', 'ejez');

        return response()->json(compact('labels', 'data'));
    }
}
