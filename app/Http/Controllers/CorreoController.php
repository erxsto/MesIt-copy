<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarCorreoMailable;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function index()
    {
        return view('Correos.index');
    }
    public function store(Request $request)
    {
        //validaciones para el formulario
        $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);


        $correo = new EnviarCorreoMailable($request->all());
        Mail::to('amats@gmail.com')->send($correo);
        return "Mensaje enviado.";
    }
}
