<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tutors_Students;
use App\Subjects_Students;
use App\Homeworks;
use Response;
use Validator;
use DB;

class Tutors_StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Tutors_Students::all(), 200);
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
        //
    }
    public function setStudents(Request $request)
    {
        try
        {
            if ( $request->get('students') )
            {
                DB::beginTransaction();
                $Array = $request->get('students');
                $tutor = $request->get('tutor');
                foreach ($Array as $value)
                {
                    $existe = Tutors_Students::whereRaw('student=? and tutor=?',[$value['id'],$tutor])->first();
                    if(count($existe)<=0){    
                        $registro = new Tutors_Students();
                        $registro->student       = $value['id'];
                        $registro->tutor       = $tutor;
                        
                        $registro->save();
                    }
                }
        
                DB::commit();
                $returnData = array (
                    'status' => 200,
                    'message' => "success"
                );
                return Response::json($returnData, 200);
            }
            else
            {
                DB::rollback();
                $returnData = array (
                    'status' => 400,
                    'message' => 'Invalid Parameters'
                );
                return Response::json($returnData, 200);
            }    
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
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
        }
        catch (Exception $e)
        {
            DB::rollback();
            $returnData = array (
                'status' => 500,
                'message' => $e->getMessage()
            );
            return Response::json($returnData, 500);
        }
    }
    public function removeStudents(Request $request)
    {
        try
        {
            if ( $request->get('students') )
            {
                DB::beginTransaction();
                $Array = $request->get('students');
                $tutor = $request->get('tutor');
                $studentsId = collect();
                foreach ($Array as $value)
                {
                    $objectDelete = Tutors_Students::whereRaw('student=? and tutor=?',[$value['id'],$tutor])->first();
                    if(count($objectDelete)>0){    
                        $studentsId->push($objectDelete->id); 
                        Tutors_Students::destroy($objectDelete->id);      
                    } 
                }

                DB::commit();
                $returnData = array (
                    'status' => 200,
                    'message' => "success"
                );
                return Response::json($returnData, 200);
            }
            else
            {
                DB::rollback();
                $returnData = array (
                    'status' => 400,
                    'message' => 'Invalid Parameters'
                );
                return Response::json($returnData, 400);
            }    
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
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
        }
        catch (Exception $e)
        {
            DB::rollback();
            $returnData = array (
                'status' => 500,
                'message' => $e->getMessage()
            );
            return Response::json($returnData, 500);
        }
    }

    public function getTutorsStudentsHomeworks($id)
    {
        $objectSee = Tutors_Students::select('student')->where('tutor',$id)->get();
        if ($objectSee) {
            $subjects = Subjects_Students::select('id')->whereIn('student',$objectSee)->get();
            $objectSee1 = Homeworks::whereIn('subject_teacher',$subjects)->with('students')->get();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}