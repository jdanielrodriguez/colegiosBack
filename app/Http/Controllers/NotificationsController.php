<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Notifications;
use App\Tutors_Students;
use Response;
use Validator;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Notifications::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'          => 'required',
            'message'          => 'required',
            'affected'          => 'required',
            'sender'          => 'required'
        ]);
        if ( $validator->fails() ) {
            $returnData = array (
                'status' => 400,
                'message' => 'Invalid Parameters',
                'validator' => $validator
            );
            return Response::json($returnData, 400);
        }
        else {
            try {
                $objectSee = Tutors_Students::where('student',$request->get('affected'))->with('tutorInfo','studentInfo')->get();
                if($objectSee){
                    foreach ($objectSee as $value) {
                        $newObject = new Notifications();
                        $newObject->title             = $request->get('title');
                        $newObject->message           = $request->get('message');
                        $newObject->affected          = $request->get('affected');
                        $newObject->receiver          = $value->tutor;
                        $newObject->sender            = $request->get('sender');
                        $newObject->save();
                        Mail::send('emails.notificationAssistance', ['empresa' => 'FoxyLabs', 'url' => 'http://colegios.foxylabs.xyz', 'nombre' => $value->tutorInfo->firstname.' '.$value->tutorInfo->lastname, 'estudiante' => $value->studentInfo->firstname.' '.$value->studentInfo->lastname, 'email' => $value->tutorInfo->email, 'name' => $value->firstname.' '.$value->lastname, 'cuerpo' => $newObject->message], function (Message $message) use ($value){
                            $message->from('info@foxylabs.gt', 'Info FoxyLabs')
                                    ->sender('info@foxylabs.gt', 'Info FoxyLabs')
                                    ->to($value->tutorInfo->user->email, $value->tutorInfo->firstname.' '.$value->tutorInfo->lastname)
                                    ->replyTo('info@foxylabs.gt', 'Info FoxyLabs')
                                    ->subject('Notificacion de Estudiante');
                        
                        });
                    }
                    return Response::json($objectSee, 200);
                    
                }
            
            } catch (Exception $e) {
                $returnData = array (
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return Response::json($returnData, 500);
            }
        }
    }
    public function notificationsByTutors($id)
    {
        $objectSee = Notifications::whereRaw('receiver=?',$id)->with('tutors')->with('students')->with('teachers')->get();
        if ($objectSee) {
            return Response::json($objectSee, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function notificationsByStudents($id)
    {
        $objectSee = Notifications::whereRaw('affected=? and state>1',$id)->with('tutors')->with('students')->with('teachers')->get();
        if ($objectSee) {
            return Response::json($objectSee, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objectSee = Notifications::find($id);
        if ($objectSee) {

            return Response::json($objectSee, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateByTutors(Request $request, $id)
    {
       $objectSee = Notifications::whereRaw('receiver=? and state=3',$id)->get();
       if ($objectSee) {
           try {
               foreach ($objectSee as $value) {
                $objectUpdate = Notifications::find($value->id);
                $objectUpdate->state = $request->get('state', $objectUpdate->state);
                $objectUpdate->save();
               }
                
               return Response::json($objectSee, 200);
           } catch (Exception $e) {
               $returnData = array (
                   'status' => 500,
                   'message' => $e->getMessage()
               );
               return Response::json($returnData, 500);
           }
       }
       else {
           $returnData = array (
               'status' => 404,
               'message' => 'No record found'
           );
           return Response::json($returnData, 404);
       }
    }

    public function updateByStudents(Request $request, $id)
    {
       $objectSee = Notifications::whereRaw('affected=? and state=3',$id)->get();
       if ($objectSee) {
           try {
               foreach ($objectSee as $value) {
                $objectUpdate = Notifications::find($value->id);
                $objectUpdate->state = $request->get('state', $objectUpdate->state);
                $objectUpdate->save();
               }
                
               return Response::json($objectSee, 200);
           } catch (Exception $e) {
               $returnData = array (
                   'status' => 500,
                   'message' => $e->getMessage()
               );
               return Response::json($returnData, 500);
           }
       }
       else {
           $returnData = array (
               'status' => 404,
               'message' => 'No record found'
           );
           return Response::json($returnData, 404);
       }
    }

    public function update(Request $request, $id)
    {
       $objectUpdate = Notifications::find($id);
       if ($objectUpdate) {
           try {
               $objectUpdate->state = $request->get('state', $objectUpdate->state);
       
               $objectUpdate->save();
               return Response::json($objectUpdate, 200);
           } catch (Exception $e) {
               $returnData = array (
                   'status' => 500,
                   'message' => $e->getMessage()
               );
               return Response::json($returnData, 500);
           }
       }
       else {
           $returnData = array (
               'status' => 404,
               'message' => 'No record found'
           );
           return Response::json($returnData, 404);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objectDelete = Notifications::find($id);
        if ($objectDelete) {
            try {
                Notifications::destroy($id);
                return Response::json($objectDelete, 200);
            } catch (Exception $e) {
                $returnData = array (
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return Response::json($returnData, 500);
            }
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }
}
