<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    public function showForm()
    {
        return view('whatsapp');
    }

    public function sendMessage(Request $request)
    {
        $account_sid = env('TWILIO_SID');
        $auth_token = env('TWILIO_AUTH_TOKEN');
        $twilio_phone_number = env('TWILIO_PHONE_NUMBER');
        $receiver_number = "whatsapp:" . $request->input('receiver_number');
        // dd($receiver_number);
        $client = new Client($account_sid, $auth_token);
        
        $message = $client->messages->create(
            $receiver_number,
            [
                "from" => "whatsapp:" . $twilio_phone_number,
                "body" => $request->input('message')
            ]
        );

        return redirect()->back()->with('success', 'Message Sent!');
    }
}
