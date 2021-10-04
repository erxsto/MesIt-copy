<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class DashboardController extends Controller
{
    public function index()
    {
        $query = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez FROM dbo.grafica_ejes ORDER BY id DESC');
        return view('home', ['grafica' => $query]);
    }
    public function datadashboard()
    {
        $graficas = grafica_ejes::latest()->take(5)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');
        $datay = $graficas->pluck('ejey');
        $dataz = $graficas->pluck('ejez');
        return response()->json(compact('labels', 'data', 'datay', 'dataz'));
    }
}
