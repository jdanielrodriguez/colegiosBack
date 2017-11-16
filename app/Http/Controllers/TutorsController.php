<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Tutors;
use App\Students;
use App\Tutors_Students;
use App\Notifications;
use Response;
use Validator;

class TutorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Tutors::all(), 200);
    }

    public function getStudents($id)
    {
        $objectSee = Tutors::find($id);
        if ($objectSee) {
            
            $student = Tutors_Students::select('student')->where('tutor',$objectSee->id)->get();
            $students = Students::whereIn('id',$student)->with('user')->get();
            return Response::json($students, 200);
        
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
            'firstname'     => 'required',
            'lastname'      => 'required',
            'address'       => 'required',
            'cellphone'     => 'required'
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
                    $newObject = new Tutors();
                    $newObject->firstname       = $request->get('firstname');
                    $newObject->lastname        = $request->get('lastname');
                    $newObject->address         = $request->get('address');
                    $newObject->cellphone       = $request->get('cellphone');
                    $newObject->phone           = $request->get('phone');
                    $newObject->save();
                    return Response::json($newObject, 200);
                
                } catch (Exception $e) {
                    $returnData = array (
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return Response::json($returnData, 500);
                }   
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
        $objectSee = Tutors::find($id);
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
    public function getTutorStudents(){
        $objectSee = Tutors_Students::select('tutor')->groupby('tutor')->with('tutorInfo')->first();
        if ($objectSee) {
            $objectSee1 = Tutors_Students::where('tutor',$objectSee->tutor)->with('studentInfo')->get();
            $return = array (
                'tutor' => $objectSee->tutorInfo,
                'students' => $objectSee1
            );
            return Response::json($return, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function getTutorBussy()
    {
        $objectSee = Tutors_Students::select('tutor')->get();
        if ($objectSee) {

            $objectRet = Tutors::whereIn('id',$objectSee)->get();

            return Response::json($objectRet, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }
    public function assistanceNotifications($id,$id2,Request $request){
        $objectUpdate = Tutors_Students::whereRaw('student=?',$id)->with('tutorInfo')->with('studentInfo')->first();
        if ($objectUpdate) {
            try {
                
                $newObject = new Notifications();
                $newObject->affected       = $objectUpdate->student;
                $newObject->receiver        = $objectUpdate->tutor;
                $newObject->sender         = $id2;
                $newObject->type         = 2;
                $newObject->title         = "Inasistencia de ".$objectUpdate->studentInfo->firstname." en el curso ".$request->get('name');
                $newObject->message       = "Su hijo ".$objectUpdate->studentInfo->firstname." no asistio al curso de ".$request->get('name')." el dia de hoy.";
                $newObject->save();
                
                Mail::send('emails.notificationAssistance', ['empresa' => 'FoxyLabs', 'url' => 'http://colegios.foxylabs.xyz', 'nombre' => $objectUpdate->tutorInfo->firstname.' '.$objectUpdate->tutorInfo->lastname, 'estudiante' => $objectUpdate->studentInfo->firstname.' '.$objectUpdate->studentInfo->lastname, 'email' => $objectUpdate->tutorInfo->email, 'name' => $objectUpdate->firstname.' '.$objectUpdate->lastname, 'cuerpo' => $newObject->message], function (Message $message) use ($objectUpdate){
                    $message->from('info@foxylabs.gt', 'Info FoxyLabs')
                            ->sender('info@foxylabs.gt', 'Info FoxyLabs')
                            ->to($objectUpdate->tutorInfo->user->email, $objectUpdate->tutorInfo->firstname.' '.$objectUpdate->tutorInfo->lastname)
                            ->replyTo('info@foxylabs.gt', 'Info FoxyLabs')
                            ->subject('Notificacion de Inasistencia');
                
                });
                
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
    public function homeworksNotifications($id,$id2,Request $request){
        $objectUpdate = Tutors_Students::whereRaw('student=?',$id)->with('tutorInfo')->with('studentInfo')->first();
        if ($objectUpdate) {
            try {
                
                $newObject = new Notifications();
                $newObject->affected       = $objectUpdate->student;
                $newObject->receiver        = $objectUpdate->tutor;
                $newObject->sender         = $id2;
                $newObject->type         = 1;
                $newObject->title         = "Entrega de tarea ".$request->get('name')." por ".$objectUpdate->studentInfo->firstname." del curso ".$request->get('subject');
                $newObject->message       = "Su hijo ".$objectUpdate->studentInfo->firstname." entrego la tarea ".$request->get('name')." del curso ".$request->get('subject')." obteniendo una nota de ".$request->get('student_note')."/".$request->get('homework_note')." puntos";
                $newObject->save();
                
                Mail::send('emails.notificationHomeworks', ['empresa' => 'FoxyLabs', 'url' => 'http://colegios.foxylabs.xyz', 'nombre' => $objectUpdate->tutorInfo->firstname.' '.$objectUpdate->tutorInfo->lastname, 'estudiante' => $objectUpdate->studentInfo->firstname.' '.$objectUpdate->studentInfo->lastname, 'email' => $objectUpdate->tutorInfo->user->email, 'name' => $objectUpdate->firstname.' '.$objectUpdate->lastname, 'cuerpo' => $newObject->message], function (Message $message) use ($objectUpdate){
                    $message->from('info@foxylabs.gt', 'Info FoxyLabs')
                            ->sender('info@foxylabs.gt', 'Info FoxyLabs')
                            ->to($objectUpdate->tutorInfo->user->email, $objectUpdate->tutorInfo->firstname.' '.$objectUpdate->tutorInfo->lastname)
                            ->replyTo('info@foxylabs.gt', 'Info FoxyLabs')
                            ->subject('Notificacion de Tareas');
                
                });
                
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
    public function update(Request $request, $id)
    {
        $objectUpdate = Tutors::find($id);
        if ($objectUpdate) {
            try {
                
                $objectUpdate->firstname       = $request->get('firstname', $objectUpdate->firstname);    
                $objectUpdate->lastname        = $request->get('lastname', $objectUpdate->lastname);
                $objectUpdate->address         = $request->get('address', $objectUpdate->address);
                $objectUpdate->cellphone       = $request->get('cellphone', $objectUpdate->cellphone);
                $objectUpdate->phone           = $request->get('phone', $objectUpdate->phone); 
                $objectUpdate->state           = $request->get('state', $objectUpdate->state);    
                $objectUpdate->autorization    = $request->get('autorization', $objectUpdate->autorization);    
                
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
        $objectDelete = Tutors::find($id);
        if ($objectDelete) {
            try {
                Tutors::destroy($id);
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