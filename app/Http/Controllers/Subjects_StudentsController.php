<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Subjects_Students;
use App\Students;
use App\Homeworks;
use Response;
use PDF;
use Validator;
class Subjects_StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Subjects_Students::all(), 200);
    }
    public function getSubjectsStudents($id)
    {
        $objectSee = Subjects_Students::where('cycle_study_day_grade_subject',$id)->with('students')->with('assistance')->with('homework')->get();
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

    public function getSubjectStudent(Request $request,$id,$id2)
    {
        if($request->get('filter')=='entregadas'){
            $objectSee = Subjects_Students::whereRaw('student=? and cycle_study_day_grade_subject=?',[$id2,$id])->with('students')->with('assistance')->with('homeworkNotAllow')->first();
        }else
        if($request->get('filter')=='porentregar'){
            $objectSee = Subjects_Students::whereRaw('student=? and cycle_study_day_grade_subject=?',[$id2,$id])->with('students')->with('assistance')->with('homeworkAllow')->first();
        }else {
            $objectSee = Subjects_Students::whereRaw('student=? and cycle_study_day_grade_subject=?',[$id2,$id])->with('students')->with('assistance')->with('homework')->first();
        }
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
    public function studentsReport($id,$id2)
    {
        $objectSee = Subjects_Students::whereRaw('student=? and cycle_study_day_grade_subject=?',[$id2,$id])->with('students')->with('assistance')->with('homework')->first();
        if ($objectSee) {

            $viewPDF = view('pdf.StudentsWithData', ["student" => $objectSee]);
            $pdf = PDF::loadHTML($viewPDF);
            return $pdf->stream('download.pdf');
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
        
    }

    public function studentsNotes($id)
    {
        $objectSee = Subjects_Students::whereRaw('student=?',[$id])->with('students')->with('assistance')->with('homework')->with('subjects')->get();
        if ($objectSee) {
            return Response::json($objectSee, 200);
            $returnData = array (
                'student' => 404,
                'subjects' => 'No record found'
            );
            $viewPDF = view('pdf.StudentsWithData', ["student" => $objectSee]);
            $pdf = PDF::loadHTML($viewPDF);
            return $pdf->stream('download.pdf');
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
        
    }

    public function getSubjectsStudentsHomeworks($id)
    {
        $subjects = Subjects_Students::select('id')->where('student',$id)->get();
        if ($subjects) {
            $objectSee = Homeworks::whereIn('subject_teacher',$subjects)->with('students')->get();
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

    public function getStudentsSubjects($id)
    {
        $objectSee = Subjects_Students::where('student',$id)->with('subjects')->with('homework')->with('students')->get();
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

    public function getStudentsSubject($id,$id2)
    {
        $objectSee = Subjects_Students::whereRaw('student=? and cycle_study_day_grade_subject=?',[$id,$id2])->with('subjects')->with('homework')->get();
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
            'student'          => 'required',
            ''          => 'required',
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
                $newObject = new Subjects_Students();
                $newObject->year                          = date('Y-m-d');
                $newObject->cycle_study_day_grade_subject = $request->get('cycle_study_day_grade_subject');
                $newObject->student                       = $request->get('student');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objectSee = Subjects_Students::find($id);
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
        $objectUpdate = Subjects_Students::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->cycle_study_day_grade_subject = $request->get('cycle_study_day_grade_subject', $objectUpdate->cycle_study_day_grade_subject);
                $objectUpdate->student                       = $request->get('student', $objectUpdate->student);
                
                $objectUpdate->save();
                return Response::json($objectUpdate, 200);
            }catch (\Illuminate\Database\QueryException $e) {
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
        $objectDelete = Subjects_Students::find($id);
        if ($objectDelete) {
            try {
                Subjects_Students::destroy($id);
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
