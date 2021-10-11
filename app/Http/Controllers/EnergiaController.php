<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EnergiaController extends Controller
{
    public function index(){

        return view('content.energia');
    }

    
    public function dataenergia(){


        $energia = \DB::select('SELECT TOP 1 * FROM variador ORDER BY id DESC');
        return response()->json(
            $energia
        ); 
    }
    public function grafs(){


        $energias = \DB::select('select top 10 * from variador order by id desc');
        return response()->json(
            
            $energias
        ); 
    }

    public function gfases(){

        return view('content.graf.gfases');
    }

    public function gvolts(){

        return view('content.graf.gvolts');
    }

    public function gpotencias(){

        return view('content.graf.gpotencias');
    }

    public function gfye(){

        return view('content.graf.gfye');
    }
}
