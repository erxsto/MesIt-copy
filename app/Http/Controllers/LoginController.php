<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\grafica_ejes;

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
            $datos = DB::select("Select * FROM users WHERE id = '{$consulta[0]->id}'");
        if (count($consulta) == 0) {

            return redirect()->route("login");
        } else {
            if($datos[0]->tipo == 'Administrador') {
                $request->session()->put('session_id', $consulta[0]->id);
                $request->session()->put('session_name', $consulta[0]->name);
                $request->session()->put('session_tipo', 'Administrador');
    
                // ------------- Consultar sesion ---------------
    
                $session_id = $request->session()->get('session_id');
                $session_name = $request->session()->get('session_name');
                $session_tipo = $request->session()->get('session_tipo');
                return redirect()->route("alertas");

            } else if($datos[0]->tipo == 'Operador'){
                $request->session()->put('session_id', $consulta[0]->id);
                $request->session()->put('session_name', $consulta[0]->name);
                $request->session()->put('session_tipo', 'Operador');
    
                // ------------- Consultar sesion ---------------
    
                $session_id = $request->session()->get('session_id');
                $session_name = $request->session()->get('session_name');
                $session_tipo = $request->session()->get('session_tipo');
                return redirect()->route('/');
            }

            //  ------------- Creacion de sesiones ---------------

            
        }
    }

    public function destroy(Request $request)
    {
        //Olvidamos las sesiones para cerrarlas
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_tipo');
        return redirect()->route('login');
    }
}
