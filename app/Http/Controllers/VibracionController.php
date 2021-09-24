<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VibracionController extends Controller
{
    public function vibracion()
    {
        $query=DB::table('dbo.grafica_ejes')
        ->get();
        return view('content.vibracion', ['grafica'=>$query]);
    }
    public function index()
    {
        grafica_ejes::create(['speed' => rand(30,70)]);

        $speeds = Speed::latest()->take(30)->get()->sortBy('id');
        $labels = $speeds->pluck('id');
        $data = $speeds->pluck('speed');

        return response()->json(compact('labels', 'data'));
    }
}
