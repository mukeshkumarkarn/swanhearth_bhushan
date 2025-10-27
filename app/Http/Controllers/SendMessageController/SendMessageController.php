<?php

namespace App\Http\Controllers\SendMessageController;

use App\Models\send_message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class SendMessageController extends Controller
{
    //

    public function Send_Message(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
        $send_message = new send_message;
        $send_message->user_id = $request->user_id;
        $send_message->other_person_user_id = $request->other_person_user_id;
        $send_message->message = $request->message;
        $send_message->status = 1;
        $send_message->message_time = Carbon::now('Asia/Kolkata');
        $result = $send_message->save();
        if ($result) {
            return ["return" => "Send Message Sucessfull"];
        } else {
            return ["return" => "Not Send Message Sucessfull"];
        }
    }
    
}
