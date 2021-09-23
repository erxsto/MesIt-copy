<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VibracionController extends Controller
{
    public function vibracion()
    {
        return view('content/vibracion');
    }
}
