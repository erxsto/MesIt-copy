<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\grafica_ejes;
use DB;

class PDFController extends Controller
{
    public function PDFv(){
        $graficas = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez,created_at FROM dbo.grafica_ejes ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFvibracion', compact('graficas'));
        return $pdf->download('Vibracion.pdf');
    }
    public function PDFt(){
        $graficas=DB::table('dbo.temperatura')
        ->get();
        $pdf = PDF::loadView('content.PDFtemperatura', compact('graficas'));
        return $pdf->download('Temperatura.pdf');
    }
    public function PDFef(){
        $graficas = \DB::select('SELECT id,fase1A,fase2A,fase3A,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiaf', compact('graficas'));
        return $pdf->download('Fases.pdf');
    }
    public function PDFev(){
        $graficas = \DB::select('SELECT id,voltsL1,voltsL2,voltsL3,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiav', compact('graficas'));
        return $pdf->download('Volts.pdf');
    }
    public function PDFep(){
        $graficas = \DB::select('SELECT id,pottreactiva,facpotencia,pottactiva,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiap', compact('graficas'));
        return $pdf->download('Potencias.pdf');
    }
    public function PDFefe(){
        $graficas = \DB::select('SELECT id,hz,energiaa,energiar,created_at FROM dbo.variador ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFenergiafe', compact('graficas'));
        return $pdf->download('Frecuencia y energía.pdf');
    }
}
