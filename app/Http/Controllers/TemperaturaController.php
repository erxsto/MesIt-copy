<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TemperaturaController extends Controller
{
    public function index(){
        $temps=DB::table('dbo.temperatura')->limit(5)
        ->get();
        return view('content.temperatura', ['grafica'=>$temps]);
    }

    public function datatemp(){


        $temps = \DB::select('SELECT TOP 1 id,temp FROM temperatura ORDER BY id DESC');
        return response()->json(
            $temps
        ); 
    }
}
