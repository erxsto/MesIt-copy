<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Telegram;

use Illuminate\Http\Request;
use DB;
use App\Models\grafica_ejes;

class VibracionController extends Controller
{
    public function index(Request $request)
    {
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = grafica_ejes::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
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

            //TELEGRAM MSG

            $text = '¡Alerta Crítica! , Revisa Tu módulo Vibración , eje z';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        } else if ($data[0] >= 1.5 && $data[0] < 2.9) {

            //TELEGRAM MSG

            $text = '¡Advertencia! , Revisa Tu módulo Vibración , eje z';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        }

        return response()->json(compact('labels', 'data'));
    }
    public function dataalertx()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejex');

        if ($data[0] >= 2.9) {

            // require_once '../vendor/autoload.php';
            // $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            // $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            // $twilio = new Client($sid, $token);

            // $message = $twilio->messages
            //     ->create(
            //         "whatsapp:+5217227749519", // to 
            //         array(
            //             "from" => "whatsapp:+14155238886",
            //             "body" => "Alerta Crítica! , Revisa Tu módulo 'vibracion' en Eje x"
            //         )
            //     );

            //TELEGRAM MSG

            $text = '¡Alerta Crítica! , Revisa Tu módulo Vibración , eje x';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        } else if ($data[0] >= 1.5 && $data[0] < 2.9) {

            // require_once '../vendor/autoload.php';
            // $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            // $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            // $twilio = new Client($sid, $token);

            // $message = $twilio->messages
            //     ->create(
            //         "whatsapp:+5217227749519", // to 
            //         array(
            //             "from" => "whatsapp:+14155238886",
            //             "body" => "Advertencia! , Revisa Tu módulo 'vibracion' en Eje x"
            //         )
            //     );

            //TELEGRAM MSG

            $text = '¡Advertencia! , Revisa Tu módulo Vibración , eje x';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        }
        return response()->json(compact('labels', 'data'));
    }
    public function dataalerty()
    {

        $graficas = grafica_ejes::latest()->take(1)->get()->sortBy('id');
        $labels = $graficas->pluck('id');
        $data = $graficas->pluck('ejey');

        if ($data[0] >= 2.9) {

            //TELEGRAM MSG

            $text = '¡Alerta Crítica! , Revisa Tu módulo Vibración , eje y';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        } else if ($data[0] >= 1.5 && $data[0] < 2.9) {

            //TELEGRAM MSG

            $text = '¡Advertencia! , Revisa Tu módulo Vibración , eje y';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        }

        return response()->json(compact('labels', 'data'));
    }

    // registrar ejes

    public function registrar_ejes(Request $request)
    {
        $alerta_create = alertas::insert(array(
            'tabla' => $request->tabla2,
            'descripcion' => $request->descripcion2,
        ));
        return back();
    }
}
