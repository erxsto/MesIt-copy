<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\grafica_ejes;
use App\Models\temperatura;
use App\Models\variador;
use DB;

class PDFController extends Controller
{
    public function PDFv(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = grafica_ejes::whereBetween('created_at', [$fi, $ff])->get();
        $pdf = PDF::loadView('content.PDFvibracion', compact('graficas'));
        return $pdf->download('Vibracion.pdf');
    }
    public function PDFt(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = temperatura::whereBetween('created_at', [$fi, $ff])->get();
        $pdf = PDF::loadView('content.PDFtemperatura', compact('graficas'));
        return $pdf->download('Temperatura.pdf');
    }
    public function PDFef(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = temperatura::select('id','fase1A','fase2A','fase3A')->whereBetween('created_at', [$fi, $ff])->get();
        $pdf = PDF::loadView('content.PDFenergiaf', compact('graficas'));
        return $pdf->download('Fases.pdf');
    }
    public function PDFev(Request $request){
        $graficas = \DB::select('SELECT id,voltsL1,voltsL2,voltsL3,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiav', compact('graficas'));
        return $pdf->download('Volts.pdf');
    }
    public function PDFep(Request $request){
        $graficas = \DB::select('SELECT id,pottreactiva,facpotencia,pottactiva,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiap', compact('graficas'));
        return $pdf->download('Potencias.pdf');
    }
    public function PDFefe(Request $request){
        $graficas = \DB::select('SELECT id,hz,energiaa,energiar,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiafe', compact('graficas'));
        return $pdf->download('Frecuencia y energía.pdf');
    }
}
