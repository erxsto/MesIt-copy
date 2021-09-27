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
}
