<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwilioController extends Controller
{
    
    public function ok(){
    require_once '../vendor/autoload.php';
    $sid    = "ACbd8d939516cbd568851aad8dabe03eb9"; 
    $token  = "ef2fca51d4eb54b9f1cd40004893b38d"; 
    $twilio = new Client($sid, $token); 
     
    $message = $twilio->messages 
                      ->create("whatsapp:+5217225273757", // to 
                               array( 
                                   "from" => "whatsapp:+14155238886",       
                                   "body" => "Alerta! , Revisa Tu módulo 'vibracion' en Eje x" 
                               ) 
                      ); 
     
    print($message->sid);
}
}
