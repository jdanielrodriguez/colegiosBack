<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tutors;
use App\Students;
use App\Tutors_Students;
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
            $students = Students::whereIn('id',$student)->get();
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
