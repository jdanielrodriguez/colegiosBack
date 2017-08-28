<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Homeworks;
use App\Notes;
use Response;
use Validator;
use DB;

class HomeworksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Homeworks::all(), 200);
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
            'name'          => 'required',
            'description'   => 'required',
            'finish_date'   => 'required',
            'note'   => 'required'
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
                $newObject = new Homeworks();
                $newObject->name          = $request->get('name');
                $newObject->description   = $request->get('description');
                $newObject->finish_date   = $request->get('finish_date');
                $newObject->begin_date    = date('Y-m-d');
                $newObject->comment       = $request->get('comment');
                $newObject->note          = $request->get('note');
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
    public function setHomeworks(Request $request)
    {
        try
        {
            if ( $request->get('homeworks') )
            {
                DB::beginTransaction();
                $homeworkArray = $request->get('homeworks');

               foreach ($homeworkArray as $value)
                {
                    $registro = new Homeworks();
                    $registro->name          = $value['name'];
                    $registro->description   = $value['description'];
                    $registro->finish_date   = $value['finish_date'];
                    $registro->begin_date    = date('Y-m-d');
                    $registro->note          = $value['note'];

                    $registro->save();
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

    public function setHomeworksUpdate(Request $request)
    {
        try
        {
            if ( $request->get('homeworks') )
            {
                DB::beginTransaction();
                $homeworksArray = $request->get('homeworks');

               foreach ($homeworksArray as $value)
                {
                    $objectUpdate = Homeworks::find($value['id']);
                    if ($objectUpdate) {
                        try {
                            $objectUpdate->state         = $value['state'];
                            $objectUpdate->name          = $value['name'];
                            $objectUpdate->description   = $value['description'];
                            $objectUpdate->finish_date   = $value['finish_date'];
                            $objectUpdate->comment       = $value['comment'];
                            $objectUpdate->note          = $value['note'];

                            $objectUpdate->save();

                        } catch (Exception $e) {
                            DB::rollback();
                            $returnData = array (
                                'status' => 500,
                                'message' => $e->getMessage()
                            );
                            return Response::json($returnData, 500);
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
    public function getSujectsHomeworks(Request $request,$id)
    {
        if($request->get('cycle'))
        {
            $objectSee = Notes::select('id')->whereRaw('subject=? and cycle=?',[$id,$request->get('cycle')])->get();
        }
        else
        { 
            $objectSee = Notes::select('id')->where('subject',$id)->get();
        }
        if ($objectSee) {
            $Homeworks = Homeworks::whereIn('note',$objectSee)->get();
            return Response::json($Homeworks, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function getInscriptionsHomeworks(Request $request,$id)
    {
        if($request->get('cycle'))
        {
            $objectSee = Notes::select('id')->whereRaw('inscription=? and cycle=?',[$id,$request->get('cycle')])->get();
        }
        else
        { 
            $objectSee = Notes::select('id')->where('inscription',$id)->get();
        }
        if ($objectSee) {
            $Homeworks = Homeworks::whereIn('note',$objectSee)->get();
            return Response::json($Homeworks, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function getNoteHomeworks($id)
    {
        $objectSee = Homeworks::where('note',$id)->get();
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
        $objectSee = Homeworks::find($id);
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
        $objectUpdate = Homeworks::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->state         = $request->get('state', $objectUpdate->state);
                $objectUpdate->name          = $request->get('name', $objectUpdate->state);
                $objectUpdate->description   = $request->get('description', $objectUpdate->state);
                $objectUpdate->finish_date   = $request->get('finish_date', $objectUpdate->state);
                $objectUpdate->comment       = $request->get('comment', $objectUpdate->state);
                $objectUpdate->note          = $request->get('note', $objectUpdate->state);

                $objectUpdate->save();
                return Response::json($objectUpdate, 200);
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
        $objectDelete = Homeworks::find($id);
        if ($objectDelete) {
            try {
                Homeworks::destroy($id);
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
