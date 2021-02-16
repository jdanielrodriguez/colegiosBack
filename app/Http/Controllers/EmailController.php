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
            Mail::send('emails.confirm', ['empresa' => 'Digibooks / TeachTics', 'url' => 'https://cojj.digibooks.app', 'app' => 'teachtics@josedanielrodriguez.com', 'password' => $request->get('password'), 'username' => $newObjectT->username, 'email' => $newObjectT->email, 'name' => $newObjectT->firstname.' '.$newObjectT->lastname,], function (Message $message) use ($newObjectT){
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


    public static function sendRecovery($objectUpdate, $pass){
        try {
            Mail::send('emails.recovery', ['empresa' => 'Digibooks / TeachTics', 'url' => 'https://cojj.digibooks.app', 'password' => $pass, 'email' => $objectUpdate->email, 'name' => $objectUpdate->firstname.' '.$objectUpdate->lastname,], function (Message $message) use ($objectUpdate){
                $message->from('teachtics@josedanielrodriguez.com', 'Info TechTics')
                        ->sender('teachtics@josedanielrodriguez.com', 'Info TechTics')
                        ->to($objectUpdate->email, $objectUpdate->firstname.' '.$objectUpdate->lastname)
                        ->replyTo('teachtics@josedanielrodriguez.com', 'Info TechTics')
                        ->subject('Contraseña Reestablecida');
            });
        } 
        catch (Swift_TransportException $e) {
        }
    }
}
