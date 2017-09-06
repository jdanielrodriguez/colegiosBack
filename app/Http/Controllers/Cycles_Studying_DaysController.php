<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cycles_Studying_Days;
use Response;
use Validator;
class Cycles_Studying_DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Cycles_Studying_Days::all(), 200);
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
           'begin'          => 'required',
           'end'            => 'required',
           'cycle'          => 'required',
           'studying_day'   => 'required'
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
               $newObject = new Cycles_Studying_Days();
               $newObject->begin            = $request->get('begin');
               $newObject->end            = $request->get('end');
               $newObject->cycle            = $request->get('cycle');
               $newObject->studying_day            = $request->get('studying_day');
               $newObject->year            = substr($request->get('begin'));
               $newObject->column            = $request->get('get');
               $newObject->column            = $request->get('get');
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
