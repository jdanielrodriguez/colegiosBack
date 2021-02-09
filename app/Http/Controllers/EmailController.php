<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

use Response;
use Validator;
use DB;
use Hash;

class EmailController extends Controller
{
    public static function sendConfirmUser($newObjectT, Request $request){
        try {
            Mail::send('emails.confirm', ['empresa' => 'TeachTics', 'url' => 'https://TeachTics.gt', 'app' => 'teachtics@josedanielrodriguez.com', 'password' => $request->get('password'), 'username' => $newObjectT->username, 'email' => $newObjectT->email, 'name' => $newObjectT->firstname.' '.$newObjectT->lastname,], function (Message $message) use ($newObjectT){
                $message->from('teachtics@josedanielrodriguez.com', 'Info TeachTics')
                        ->sender('teachtics@josedanielrodriguez.com', 'Info TeachTics')
                        ->to("".$newObjectT->email, $newObjectT->firstname.' '.$newObjectT->lastname)
                        ->replyTo('teachtics@josedanielrodriguez.com', 'Info TeachTics')
                        ->subject('Usuario Creado');
            });
        } 
        catch (Swift_TransportException $e) {
        }
    }
}
