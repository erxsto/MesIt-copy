<?php

namespace App\Http\Controllers;

use App\Models\modulo_control;
use Illuminate\Http\Request;
use DB;

class ModuloController extends Controller
{
    public function dataenergiam()
    {
        //Mandamos a llamar a la tabla control_var
        $energia = \DB::select('SELECT TOP 1 * FROM control_var ORDER BY id DESC');
        return response()->json(
            $energia
        );
    }
    public function modulo_control()
    {
        return view('content.modulo_control');
    }
    public function valueslider(Request $request)
    {
        if ($request->ajax()) {
            // return response()->json(['status'=>'Ajax request']);
            // $idl = DB::table('control_var')->latest('id')->first();
             $idl = DB::table('control_var')->latest('id')->first();
            //$tabla = modulo_control::latest()->take(1)->get()->sortBy('id');
            //$idl = $tabla->pluck('id');
            $frecuenciac = DB::insert("UPDATE [dbo].[control_var] SET frecuencia = '$request->data' WHERE id = '$idl->id'");
            return redirect()->back();
        }
    }
    public function updateizq(Request $request){
        if ($request->ajax()) {
             $idl = DB::table('control_var')->latest('id')->first();
            $new = DB::insert("UPDATE [dbo].[control_var] SET izquierdo = '$request->data' WHERE id = '$idl->id'");
            return redirect()->back();
        }
    }

    public function updateder(Request $request){
        if ($request->ajax()) {
             $idl = DB::table('control_var')->latest('id')->first();
            $new = DB::insert("UPDATE [dbo].[control_var] SET derecho = '$request->data' WHERE id = '$idl->id'");
            return redirect()->back();
        }
    }

    public function updatestop(Request $request){
        if ($request->ajax()) {
             $idl = DB::table('control_var')->latest('id')->first();
            $new = DB::insert("UPDATE [dbo].[control_var] SET stop = '$request->data' WHERE id = '$idl->id'");
            return redirect()->back();
        }
    }
    public function updatereset(Request $request){
        if ($request->ajax()) {
             $idl = DB::table('control_var')->latest('id')->first();
            $new = DB::insert("UPDATE [dbo].[control_var] SET reset = '$request->data' WHERE id = '$idl->id'");
            return redirect()->back();
        }
    }

}
