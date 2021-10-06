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
    public function datacharttemp(){


        $charttemps = \DB::select('select top 10 id,cast((temp*1.8+32) as numeric(36,2)) far,cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        return response()->json(
            $charttemps
        ); 
    }
}
