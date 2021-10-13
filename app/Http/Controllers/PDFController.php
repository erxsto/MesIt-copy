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
        $graficas=DB::table('dbo.temperatura')->limit(5)
        ->get();
        $pdf = PDF::loadView('content.PDFtemperatura', compact('graficas'));
        return $pdf->download('Temperatura.pdf');
    }
}
