<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\temperatura;
use Twilio\Rest\Client;
use App\Models\alertas;

class TemperaturaController extends Controller
{
    public function fecha(Request $request)
    {
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $graficas = temperatura::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.temperatura')
        ->with(['graficas' => $graficas]);
    }
    public function index(){
        $temps=DB::table('dbo.temperatura')->limit(5)
        ->get();
        return view('content.temperatura', ['grafica'=>$temps]);
    }

    public function datatemp(){


        $temps = \DB::select('select top 1 id , cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        if ($temps[0]->temp >=30) {
            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9"; 
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d"; 
            $twilio = new Client($sid, $token); 
             
            $message = $twilio->messages 
                              ->create("whatsapp:+5217227749519", // to 
                                       array( 
                                           "from" => "whatsapp:+14155238886",       
                                           "body" => "Alerta Crítica! , Revisa Tu módulo Temperatura , es Mayor a 30." 
                                       ) 
                              );
            } else{
                return response()->json(
                    $temps
                ); 
                
                }return response()->json(
                    $temps
                ); 
        
    }
    public function d(){
    $te = \DB::select('select top 1 id , cast(temp as numeric(36,2)) temp from temperatura order by id desc');

        
                        return response()->json(
                            $te
                        ); 
    }
    public function datacharttemp(){


        $charttemps = \DB::select('select top 10 id,cast((temp*1.8+32) as numeric(36,2)) far,cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        return response()->json(
            $charttemps
        ); 
    }
    public function save_at(Request $request){
        if($request->ajax()){ 
            // return response()->json(['status'=>'Ajax request']);
         
        $alerta_create = DB::insert("insert INTO [dbo].[alertas] (tabla, descripcion) VALUES ('$request->tabla','$request->descripcion')");
        return redirect()->back();
         }
    }
    
}
