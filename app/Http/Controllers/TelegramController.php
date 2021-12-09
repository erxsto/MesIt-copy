<?php

namespace App\Http\Controllers;
use Telegram;
use Illuminate\Http\Request;

class TelegramController extends Controller
{

            public function updatedActivity()
        {
            $activity = Telegram::getUpdates();
            dd($activity);
        }

        public function prueba(){
            $text = 'Esto funciona correctamente';

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001593292840'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        }

}
