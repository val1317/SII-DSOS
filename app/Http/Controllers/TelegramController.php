<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class TelegramController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }

    public function enviar(Request $request){
        $response = Telegram::sendMessage([            
            'chat_id' => '-1001453781468', 
            'text' => $request->message
        ]);
          
        $messageId = $response->getMessageId();
        return view('mensaje');
    }
}
