<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\temperatura;
use Twilio\Rest\Client;
use App\Models\alertas;
use Telegram;

class TemperaturaController extends Controller
{
    public function fecha(Request $request)
    {
        //Iniciamos las variavles la cual contiene la fecha inicial y fecha final concatenando las horas
        $fi = $request->fecha_ini . ' 00:00:00';
        $ff = $request->fecha_fin . ' 23:59:59';
        $graficas = temperatura::whereBetween('created_at', [$fi, $ff])->limit(5)->get();
        return view('content.temperatura')
            ->with(['graficas' => $graficas]);
    }
    public function index()
    {
        $temps = DB::table('dbo.temperatura')->limit(5)
            ->get();
        return view('content.temperatura', ['grafica' => $temps]);
    }
    // Funciones TELEGRAM

    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
    // --------------------------------
    public function datatemp()
    {
        //Obtenemos de la tabla temperatura su id y temp, asignando que será numerico sin decimal ordenando descendientemente
        $temps = \DB::select('select top 1 id , cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        //Condición para enviar alerta  whatsapp
        if ($temps[0]->temp >= 30) {

            //TWILIO MSG SANDBOX
            // require_once '../vendor/autoload.php';
            // $sid    = "ACbd8d939516cbd568851aad8dabe03eb9";
            // $token  = "ef2fca51d4eb54b9f1cd40004893b38d";
            // $twilio = new Client($sid, $token);

            // $message = $twilio->messages
            //     ->create(
            //         "whatsapp:+5217227749519", // to 
            //         array(
            //             "from" => "whatsapp:+14155238886",
            //             "body" => "Alerta Crítica! , Revisa Tu módulo Temperatura , es Mayor a 30°C."
            //         )
            //     );

            //TELEGRAM MSG
            // $text = 'Alerta Crítica! , Revisa Tu módulo Temperatura , es Mayor a 30°C.';

            // Telegram::sendMessage([
            //     'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
            //     'parse_mode' => 'HTML',
            //     'text' => $text
            // ]);

        } else {
            return response()->json(
                $temps
            );
        }
        return response()->json(
            $temps
        );
    }
    // public function d()
    // {
    //     $te = \DB::select('select top 1 id , cast(temp as numeric(36,2)) temp from temperatura order by id desc');
    //     return response()->json(
    //         $te
    //     );
    // }
    public function datacharttemp()
    {
        $charttemps = \DB::select('select top 10 id,cast((temp*1.8+32) as numeric(36,2)) far,cast(temp as numeric(36,2)) temp from temperatura order by id desc');
        return response()->json(
            $charttemps
        );
    }
    public function save_at(Request $request)
    {
        if ($request->ajax()) {
            // return response()->json(['status'=>'Ajax request']);
            $alerta_create = DB::insert("insert INTO [dbo].[alertas] (tabla, descripcion, valor) VALUES ('$request->tabla','$request->descripcion','$request->valor')");



            // ultima alerta select
            $last_alert = DB::select("select top 1 * from alertas order by id desc");
            // temperatura ?
            if ($last_alert[0]->tabla == 'temperatura') {

                $id = session('session_id');
                $horarios = DB::select("select * from horario_alertas where user_id = '$id'");
                if ($horarios[0]->st != 0) {
                    $today = new Carbon();
                    $today->dayOfWeek;

                    if ($horarios[0]->lun == 0 && $today->dayOfWeek == 1 || $horarios[0]->mar == 0 && $today->dayOfWeek == 2 || $horarios[0]->mier == 0 && $today->dayOfWeek == 3 || $horarios[0]->jue == 0 && $today->dayOfWeek == 4 || $horarios[0]->vier == 0 && $today->dayOfWeek == 5 || $horarios[0]->sab == 0 && $today->dayOfWeek == 6 || $horarios[0]->dom == 0 && $today->dayOfWeek == 0) {

                        // FECHA INICIO BD
                        $fechai = strtotime($horarios[0]->h_ini);
                        $hora_ini = date('H', $fechai);
                        $min_ini = date('i', $fechai);
                        $seg_ini = date('s', $fechai);
                        // FECHA FIN BD
                        $fechaf = strtotime($horarios[0]->h_fin);
                        $hora_fin = date('H', $fechaf);
                        $min_fin = date('i', $fechaf);
                        $seg_fin = date('s', $fechaf);


                        // return $today->format('Y-m-d H:i:s');

                        // Comprobar si la hora actual está entre el horario laboral establecidas
                        $hora_act = $today->format('H');

                        if ($hora_act >= $hora_ini && $hora_act <= $hora_fin) {

                            //TELEGRAM MSG
                            $text = 'Alerta Crítica! , Revisa Tu módulo Temperatura , es Mayor a 30°C.';

                            Telegram::sendMessage([
                                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                'parse_mode' => 'HTML',
                                'text' => $text
                            ]);
                        }
                    }
                }
            } elseif ($last_alert[0]->tabla == 'vibracion') {
                $id = session('session_id');
                $horarios = DB::select("select * from horario_alertas where user_id = '$id'");
                if ($horarios[0]->st != 0) {
                    $today = new Carbon();
                    $today->dayOfWeek;

                    if ($horarios[0]->lun == 0 && $today->dayOfWeek == 1 || $horarios[0]->mar == 0 && $today->dayOfWeek == 2 || $horarios[0]->mier == 0 && $today->dayOfWeek == 3 || $horarios[0]->jue == 0 && $today->dayOfWeek == 4 || $horarios[0]->vier == 0 && $today->dayOfWeek == 5 || $horarios[0]->sab == 0 && $today->dayOfWeek == 6 || $horarios[0]->dom == 0 && $today->dayOfWeek == 0) {

                        // FECHA INICIO BD
                        $fechai = strtotime($horarios[0]->h_ini);
                        $hora_ini = date('H', $fechai);
                        $min_ini = date('i', $fechai);
                        $seg_ini = date('s', $fechai);
                        // FECHA FIN BD
                        $fechaf = strtotime($horarios[0]->h_fin);
                        $hora_fin = date('H', $fechaf);
                        $min_fin = date('i', $fechaf);
                        $seg_fin = date('s', $fechaf);


                        // return $today->format('Y-m-d H:i:s');

                        // Comprobar si la hora actual está entre el horario laboral establecidas
                        $hora_act = $today->format('H');

                        if ($hora_act >= $hora_ini && $hora_act <= $hora_fin) {

                            if ($last_alert[0]->descripcion == 'Alerta crítica Eje X') {
                                //TELEGRAM MSG
                                $text = 'Alerta Crítica! , Revisa Tu módulo Vibración , eje X.';

                                Telegram::sendMessage([
                                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                    'parse_mode' => 'HTML',
                                    'text' => $text
                                ]);
                            } elseif ($last_alert[0]->descripcion == 'Alerta crítica Eje Y') {

                                //TELEGRAM MSG
                                $text = 'Alerta Crítica! , Revisa Tu módulo Vibración , eje Y.';

                                Telegram::sendMessage([
                                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                    'parse_mode' => 'HTML',
                                    'text' => $text
                                ]);
                            } elseif ($last_alert[0]->descripcion == 'Alerta crítica Eje Z') {

                                //TELEGRAM MSG
                                $text = 'Alerta Crítica! , Revisa Tu módulo Vibración , eje Z.';

                                Telegram::sendMessage([
                                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                    'parse_mode' => 'HTML',
                                    'text' => $text
                                ]);
                            } elseif ($last_alert[0]->descripcion == 'Advertencia en Eje X') {


                                //TELEGRAM MSG
                                $text = 'Advertencia , Revisa Tu módulo Vibración , eje X.';

                                Telegram::sendMessage([
                                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                    'parse_mode' => 'HTML',
                                    'text' => $text
                                ]);
                            } elseif ($last_alert[0]->descripcion == 'Advertencia en Eje Y') {


                                //TELEGRAM MSG
                                $text = 'Advertencia , Revisa Tu módulo Vibración , eje Y.';

                                Telegram::sendMessage([
                                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                    'parse_mode' => 'HTML',
                                    'text' => $text
                                ]);
                            } elseif ($last_alert[0]->descripcion == 'Advertencia en Eje Z') {


                                //TELEGRAM MSG
                                $text = 'Advertencia , Revisa Tu módulo Vibración , eje X.';

                                Telegram::sendMessage([
                                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                                    'parse_mode' => 'HTML',
                                    'text' => $text
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
