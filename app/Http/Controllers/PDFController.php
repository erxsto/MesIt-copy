<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\grafica_ejes;
use App\Models\temperatura;
use App\Models\variador;
use DB;
use Carbon\Carbon;
use App\Models\alertas;

class PDFController extends Controller
{
    public function PDFv(Request $request)
    {
        //asignamos el tiempo de repuesta con el cual la pagina va a permitir
        set_time_limit(120);
        //Asignamos las variables y concatenamos las horas 
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = grafica_ejes::whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        //generamos el pdf para en la siguiente linea poderlo descargarlo
        $pdf = PDF::loadView('content.PDFvibracion', compact('graficas'));
        return $pdf->download('Vibracion.pdf');
    }
    public function PDFt(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = temperatura::whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $pdf = PDF::loadView('content.PDFtemperatura', compact('graficas'));
        return $pdf->download('Temperatura.pdf');
    }
    public function PDFe(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $pdf = PDF::loadView('content.PDFenergia', compact('graficas'));
        return $pdf->download('Energia.pdf');
    }
    public function PDFef(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::select('id', 'fase1A', 'fase2A', 'fase3A', 'created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $pdf = PDF::loadView('content.PDFenergiaf', compact('graficas'));
        return $pdf->download('Fases.pdf');
    }
    public function PDFev(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::select('id', 'voltsL1', 'voltsL2', 'voltsL3', 'created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $pdf = PDF::loadView('content.PDFenergiav', compact('graficas'));
        return $pdf->download('Volts.pdf');
    }
    public function PDFep(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::select('id', 'pottreactiva', 'facpotencia', 'pottactiva', 'consumo_total', 'created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $pdf = PDF::loadView('content.PDFenergiap', compact('graficas'));
        return $pdf->download('Potencias.pdf');
    }
    public function PDFefe(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = variador::select('id', 'hz', 'energiaa', 'energiar', 'created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $pdf = PDF::loadView('content.PDFenergiafe', compact('graficas'));
        return $pdf->download('Frecuencia y energía.pdf');
    }
    public function PDFalerts(Request $request)
    {
        set_time_limit(120);
        $fi = $request->fecha_ini2 . ' 00:00:00';
        $ff = $request->fecha_fin2 . ' 23:59:59';
        // $graficas = variador::select('id','hz','energiaa','energiar','created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
        $alertas = alertas::select('tabla', 'descripcion', 'valor', 'created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();

        $pdf = PDF::loadView('content\PDFalertaspdf', compact('alertas'));
        return $pdf->download('Historial Alertas.pdf');
    }
}
