<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarCorreoMailable;
use Illuminate\Support\Facades\Mail;
<<<<<<< HEAD

class CorreoController extends Controller
{
    public function index()
    {
        return view('Correos.index');
=======
use DB;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade as PDF;
class CorreoController extends Controller
{
    public function index(Request $request){
        $fi = $request->fecha_ini1;
        $ff = $request->fecha_fin1;
                
        $fii= Carbon::parse($fi)->format('d/m/Y');
        
        $fff= Carbon::parse($ff)->format('d/m/Y');
        
        return view('Correos.index', compact('fii','fff'));
>>>>>>> 4fdfcc563b72be95145d9b850413662a921e9c21
    }
    public function store(Request $request)
    {
        //validaciones para el formulario
        $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

<<<<<<< HEAD

        $correo = new EnviarCorreoMailable($request->all());
        Mail::to('amats@gmail.com')->send($correo);
        return "Mensaje enviado.";
=======
        
        $fi1 = $request->fecha_ini11;
        $ff1 = $request->fecha_fin11;
                
        
            // $graficas = variador::select('id','hz','energiaa','energiar','created_at')->whereBetween('created_at', [$fi, $ff])->limit(50)->get();
            $alertas = DB::select("SELECT TOP 50 * FROM dbo.alertas where created_at between convert(datetime,'$fi1') and convert(datetime,'$ff1') ");
    
            $pdf = PDF::loadView('content\PDFalertaspdf', compact('alertas'));
            $output = $pdf->output();
            
        
        $correo = new EnviarCorreoMailable($request->all(),$output);
        Mail::to($request->correo)->send($correo);
        
        return redirect()->back();
>>>>>>> 4fdfcc563b72be95145d9b850413662a921e9c21
    }
}
