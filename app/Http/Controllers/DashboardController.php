<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class DashboardController extends Controller
{
    public function index()
    {
        //Mandamos a llamar a la tabla grafica ejes con los ultimos 5 registros
        $query = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez FROM dbo.grafica_ejes ORDER BY id DESC');
        return view('home', ['grafica' => $query]);
    }
    public function datadashboard()
    {
        //Obtenemos los registros de la tabla grafica_ejes con el modelo, tomamos los ultimos 5 registros
        $graficas = grafica_ejes::latest()->take(5)->get()->sortBy('id');
        $labels = $graficas->pluck('id'); //con pluck agarramos el id, igual así con las de abajo
        $data = $graficas->pluck('ejex');
        $datay = $graficas->pluck('ejey');
        $dataz = $graficas->pluck('ejez');
        //mandamos las variables a las vistas
        return response()->json(compact('labels', 'data', 'datay', 'dataz'));
    }
}
