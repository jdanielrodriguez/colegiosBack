<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students_Assistance;
use App\Subjects_Students;
use Response;
use Validator;
class Students_AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Students_Assistance::all(), 200);
    }

    public function getAssistance($id)
    {
        $objectSee = Subjects_Students::select('id')->where('cycle_study_day_grade_subject',$id)->get();
        if ($objectSee) {
            $objectSee1 = Students_Assistance::whereIn('subject_student',$objectSee)->groupby('assistance_date')->orderby('assistance_date','desc')->get();
            return Response::json($objectSee1, 200);
        
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
           'subject_student'          => 'required',
           'assistance'          => 'required'
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
               $newObject = new Students_Assistance();
               $newObject->subject_student            = $request->get('subject_student');
               $newObject->assistance                 = $request->get('assistance');
               $newObject->assistance_date                 = date('Y-m-d');
               $newObject->save();
               return Response::json($newObject, 200);
           
           } catch (\Illuminate\Database\QueryException $e) {
               if($e->errorInfo[0] == '01000'){
                   $errorMessage = "Error Constraint";
               }  else {
                   $errorMessage = $e->getMessage();
               }
               $returnData = array (
                   'status' => 505,
                   'SQLState' => $e->errorInfo[0],
                   'message' => $errorMessage
               );
               return Response::json($returnData, 500);
           } catch (Exception $e) {
               $returnData = array (
                   'status' => 500,
                   'message' => $e->getMessage()
               );
               return Response::json($returnData, 500);
           }
       }
    }
    public function insertBySubject(Request $request)
    {
        $objectFind = Subjects_Students::select('id')->whereRaw('cycle_study_day_grade_subject=?',[$request->get('subject_student')])->get();
        if ($objectFind) {
            $objectUpdate = Students_Assistance::whereIn('subject_student',$objectFind)->where('assistance_date',$request->get('assistance_date'))->get();
            if(count($objectUpdate)==0){
                try {
                    foreach ($objectFind as $value) {
                        $newObject = new Students_Assistance();
                        $newObject->subject_student            = $value->id;
                        $newObject->assistance                 = null;
                        $newObject->assistance_date            = $request->get('assistance_date');
                        $newObject->save();
                    }
                    
                    return Response::json($objectFind, 200);
                } catch (Exception $e) {
                    $returnData = array (
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return Response::json($returnData, 500);
                }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objectSee = Students_Assistance::find($id);
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
    public function updateByDate(Request $request)
    {
        $objectUpdate = Students_Assistance::whereRaw('assistance_date=? and subject_student=?',[$request->get('assistance_date'),$request->get('subject_student')])->first();
        if ($objectUpdate) {
            try {

                $objectUpdate->assistance = $request->get('assistance', $objectUpdate->assistance);
        
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
            try {
                $newObject = new Students_Assistance();
                $newObject->subject_student            = $request->get('subject_student');
                $newObject->assistance                 = $request->get('assistance');
                $newObject->assistance_date            = $request->get('assistance_date');
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

    public function updateBySubject(Request $request)
    {
        $objectFind = Subjects_Students::select('id')->whereRaw('cycle_study_day_grade_subject=?',[$request->get('subject_student')])->get();
        if ($objectFind) {
            $objectUpdate = Students_Assistance::whereIn('subject_student',$objectFind)->where('assistance_date',$request->get('assistance_date'))->get();
            try {
                foreach ($objectUpdate as $value) {
                    $objectUpdate1 = Students_Assistance::find($value->id);
                    $objectUpdate1->studied = $request->get('studied', $objectUpdate1->studied);
                    $objectUpdate1->save();
                }
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
    public function update(Request $request, $id)
    {
        $objectUpdate = Students_Assistance::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->assistance = $request->get('assistance', $objectUpdate->assistance);
        
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
        $objectDelete = Students_Assistance::find($id);
        if ($objectDelete) {
            try {
                Students_Assistance::destroy($id);
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
