<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\grafica_ejes;

class PDFController extends Controller
{
    public function PDF(){
        $graficas = \DB::select('SELECT TOP 5 id,ejex,ejey,ejez,created_at FROM dbo.grafica_ejes ORDER BY id ASC');
        $pdf = PDF::loadView('content.PDFvibracion', compact('graficas'));
        return $pdf->download('Vibracion.pdf');
    }
}
