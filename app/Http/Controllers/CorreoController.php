<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarCorreoMailable;
use Illuminate\Support\Facades\Mail;
use DB;
use Carbon\Carbon;
use App\Models\alertas;

use Barryvdh\DomPDF\Facade as PDF;

class CorreoController extends Controller
{
    public function index(Request $request)
    {
        $fi = $request->fecha_ini2;
        $ff = $request->fecha_fin2;

        // Las variables abajo son para diferentes formatos (algunas computadoras tienen diferentes)

        // $fii= Carbon::parse($fi)->format('d/m/Y');

        // $fff= Carbon::parse($ff)->format('d/m/Y');

        // return view('Correos.index', compact('fii','fff'));
        return view('Correos.index', compact('fi', 'ff'));
    }
    public function store(Request $request)
    {
        //Validamos los campos requeridos
        $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

        //Asignamos la fecha y concatenamos la hora

        $fi1 = $request->fecha_ini11 . ' 00:00:00';
        $ff1 = $request->fecha_fin11 . ' 23:59:59';


        $alertas = alertas::whereBetween('created_at', [$fi1, $ff1])->limit(30)->get();
        // $alertas = DB::select("SELECT TOP 50 * FROM dbo.alertas where created_at between convert(datetime,'$fi1') and convert(datetime,'$ff1') ");

        //Generamos un pdf para cargar la vista
        $pdf = PDF::loadView('content\PDFalertaspdf', compact('alertas'));
        $output = $pdf->output();

        //Generaremos un nuevo correo con el pdf que anteriormente cargamos
        $correo = new EnviarCorreoMailable($request->all(), $output);
        Mail::to($request->correo)->send($correo);

        return redirect()->route('/')->with('enviado', 'ok');
    }
}
