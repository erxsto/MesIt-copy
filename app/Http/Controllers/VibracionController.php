<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class VibracionController extends Controller
{
    public function index(Request $request)
    {
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = grafica_ejes::whereBetween('created_at', [$fi, $ff])->get();

        return view('content.vibracion')
            ->with(['graficas' => $graficas]);
    }
    public function datavibracion()
    {
        $graficas = grafica_ejes::latest()->take(20)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');
        $datay = $graficas->pluck('ejey');
        $dataz = $graficas->pluck('ejez');
        return response()->json(compact('labels', 'data', 'datay', 'dataz'));
    }
    public function dataalertz()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejez');

        if ($data[0] >= 2.9) {

            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+5217227749519", // to 
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje Z"
                    )
                );
        } else if ($data[0] >= 1.5 && $data[0] < 2.9) {

            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+5217227749519", // to 
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje Z"
                    )
                );
        } else {
            echo 'ok';
        }

        return response()->json(compact('labels', 'data'));
    }
    public function dataalertx()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');

        if ($data[0] >= 2.9) {

            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+5217227749519", // to 
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje x"
                    )
                );
        } else if ($data[0] >= 1.5 && $data[0] < 2.9) {

            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+5217227749519", // to 
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje x"
                    )
                );
        } else {
            echo 'ok';
        }

        return response()->json(compact('labels', 'data'));
    }
    public function dataalerty()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejey');
        
        if ($data[0] >= 2.9) {

            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+5217227749519", // to 
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje Y"
                    )
                );
        } else if ($data[0] >= 1.5 && $data[0] < 2.9) {

            require_once '../vendor/autoload.php';
            $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+5217227749519", // to 
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje Y"
                    )
                );
        } else {
            echo 'ok';
        }

        return response()->json(compact('labels', 'data'));
    }
}
