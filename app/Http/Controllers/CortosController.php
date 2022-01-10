<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CortosController extends Controller
{
    public function cortos()
    {
        return view('content.cortos');
    }
    //Consulta para una api
    public function datacorto()
    {
        $cortos = \DB::select('SELECT TOP 1 * FROM cortos ORDER BY id DESC');
        return response()->json(
            $cortos
        );
    }
}
