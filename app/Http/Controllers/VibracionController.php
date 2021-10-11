<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class VibracionController extends Controller
{
    public function index()
    {
        $query = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez,created_at FROM dbo.grafica_ejes ORDER BY id DESC');
        return view('content.vibracion', ['graficas' => $query]);
    }
    public function fecha(Request $request)
    {
        $fi = $request->fecha_ini.'00:00:00';
        $ff = $request->fecha_fin.'23:59:59';
        $graficas = grafica_ejes::whereBetween('created_at', [$fi, $ff])->get();
        $total = $graficas->sum('total');
        return redirect()->route('content.vibracion', compact('graficas', 'total'));
    }
    public function datavibracion()
    {
        $graficas = grafica_ejes::latest()->take(20)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');
        $datay = $graficas->pluck('ejey');
        $dataz = $graficas->pluck('ejez');
        return response()->json(compact('labels', 'data', 'datay', 'dataz'));
    }
    public function dataalertz()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejez');
        return response()->json(compact('labels', 'data'));
    }
    public function dataalertx()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');
        return response()->json(compact('labels', 'data'));
    }
    public function dataalerty()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejey');
        return response()->json(compact('labels', 'data'));
    }
}
