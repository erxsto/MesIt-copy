<?php

namespace App\Http\Controllers;

use DB;
use Telegram;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TelegramController extends Controller
{

    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }

    public function prueba()
    {
        // $text = 'Esto funciona correctamente';

        // Telegram::sendMessage([
        //     'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
        //     'parse_mode' => 'HTML',
        //     'text' => $text
        // ]);
        $today = new Carbon();
        if ($today->dayOfWeek == Carbon::MONDAY) {
            // return strtoupper($today->isoFormat('dd'));;
            // return $today->format('Y-m-d H:i:s');
        }
        $a = DB::select("select * from horario_alertas WHERE user_id = 2");
        return $a[0]->lun;
    }
}
