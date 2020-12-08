<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Inscriptions_Cycles_Studying_Days;
use App\Cycles_Studying_Days_Grades;
use App\Cycles_Studying_Days_Grades_Subjects;
use App\Subjects_Students;
use App\Inscriptions;
use Response;
use Validator;
use DB;

class Inscriptions_Cycles_Studying_DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Inscriptions_Cycles_Studying_Days::all(), 200);
    }
    public function getInscriptions($id)
    {
        $objectSee = Cycles_Studying_Days_Grades::find($id);
        if ($objectSee) {
            
            $grade = Inscriptions_Cycles_Studying_Days::select('inscription')->where('csdg',$objectSee->id)->get();
            $grades = Inscriptions::whereIn('id',$grade)->with('students')->get();
            return Response::json($grades, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function getBussyInscriptions_Cycles_Studying_Days()
    {
        $objectSee = Inscriptions_Cycles_Studying_Days::select('csdg')->get();
        if ($objectSee) {

            $objectRet = Cycles_Studying_Days_Grades::whereIn('id',$objectSee)->with('cycles_studying_days')->get();

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function setInscriptions(Request $request)
    {
        try
        {
            if ( $request->get('inscription') )
            {
                DB::beginTransaction();
                $Array = $request->get('inscription');
                $master = $request->get('master');
                foreach ($Array as $value)
                {
                    $existe = Inscriptions_Cycles_Studying_Days::whereRaw('inscription=? and csdg=?',[$value['id'],$master])->first();
                    if(count($existe)<=0){    
                        $registro = new Inscriptions_Cycles_Studying_Days();
                        $registro->inscription       = $value['id'];
                        $registro->csdg         = $master;
                        
                        $registro->save();
                        $materiasId = Cycles_Studying_Days_Grades_Subjects::select('id')->whereRaw('csdg=?',$master)->get();
                        foreach ($materiasId as $value1) {

                            $registro = new Subjects_Students();
                            $registro->year = date('Y-m-d');
                            $registro->cycle_study_day_grade_subject = $value1['id'];
                            $idStudent=Inscriptions::select('student')->where('id',$value['id'])->first();
                            $registro->student = $idStudent->student;
                            $registro->save();
                            
                        }
                        
                        
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
    public function removeInscriptions(Request $request)
    {
        try
        {
            if ( $request->get('inscription') )
            {
                DB::beginTransaction();
                $Array = $request->get('inscription');
                $master = $request->get('master');
                $studentsId = collect();
                foreach ($Array as $value)
                {
                    $objectDelete = Inscriptions_Cycles_Studying_Days::whereRaw('inscription=? and csdg=?',[$value['id'],$master])->first();
                    if(count($objectDelete)>0){    
                        $studentsId->push($objectDelete->id); 
                        Inscriptions_Cycles_Studying_Days::destroy($objectDelete->id); 
                        $idStudent = Inscriptions::select('student')->where('id',$value['id'])->first();
                        $materiasId = Cycles_Studying_Days_Grades_Subjects::select('id')->whereRaw('csdg=?',$master)->get();
                        foreach ($materiasId as $value1) {
                            $objectDeleteId = Subjects_Students::select('id')->whereRaw('student=? and cycle_study_day_grade_subject=?',[$idStudent->student,$value1['id']])->first();
                            Subjects_Students::destroy($objectDeleteId->id);                            
                        }
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
