<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $consulta = User::where('email', '=', $email)
            ->where('password', '=', $password)
            ->get();

        if (count($consulta) == 0) {

            return redirect()->route("login");
        } else {

            //  ------------- Creacion de sesiones ---------------

            $request->session()->put('session_id', $consulta[0]->id);
            $request->session()->put('session_name', $consulta[0]->name);
            //  $request->session()->put('session_tipo', 'heredero');

            // ------------- Consultar sesion ---------------

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            //  $session_tipo = $request->session()->get('session_tipo');


            return redirect()->route('/');
        }
    }
    public function destroy(Request $request)
    {
        //Olvidamos las sesiones para cerrarlas
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        // $request->session()->forget('session_tipo');
        return redirect()->route('login');
    }
}
