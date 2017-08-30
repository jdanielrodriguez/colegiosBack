<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Users;
use Response;
use Validator;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Users::all(), 200);
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
            'username'          => 'required',
            'password'          => 'required|min:3|regex:/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!-,:-@]).*$/',
            'email'          => 'required|email'
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
            $email = $request->get('email');
            $email_exists  = Users::whereRaw("email = ?", $email)->count();
            $user = $request->get('username');
            $user_exists  = Users::whereRaw("username = ?", $user)->count();
            if($email_exists == 0 && $user_exists == 0){
                try {
                    $newObject = new Users();
                    $newObject->username         = $request->get('username');
                    $newObject->password         = Hash::make($request->get('password'));
                    $newObject->email            = $request->get('email');
                    $newObject->type            = $request->get('type');
                    $newObject->student            = $request->get('student');
                    $newObject->teacher            = $request->get('teacher');
                    $newObject->tutor            = $request->get('tutor');
                    $newObject->save();
                    return Response::json($newObject, 200);
                
                } catch (Exception $e) {
                    $returnData = array (
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                    return Response::json($returnData, 500);
                }
            } else {
                $returnData = array(
                    'status' => 400,
                    'message' => 'User already exists',
                    'validator' => $validator->messages()->toJson()
                );
                return Response::json($returnData, 400);
            }
        }
    }
    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_pass' => 'required|min:3|regex:/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!-,:-@]).*$/',
            'old_pass'      => 'required'
        ]);

        if ($validator->fails()) {
            $returnData = array(
                'status' => 400,
                'message' => 'Invalid Parameters',
                'validator' => $validator->messages()->toJson()
            );
            return Response::json($returnData, 400);
        }
        else {
            $old_pass = $request->get('old_pass');
            $new_pass_rep = $request->get('new_pass_rep');
            $new_pass =$request->get('new_pass');
            $objectUpdate = Users::find($id);
            if ($objectUpdate) {
                try {
                    if(Hash::check($old_pass, $objectUpdate->password))
                    {                       
                        if($new_pass_rep != $new_pass)
                        {
                            $returnData = array(
                                'status' => 404,
                                'message' => 'Passwords do not match'
                            );
                            return Response::json($returnData, 404);
                        }

                        if($old_pass == $new_pass)
                        {
                            $returnData = array(
                                'status' => 404,
                                'message' => 'New passwords it is same the old password'
                            );
                            return Response::json($returnData, 404);
                        }
                        $objectUpdate->password = Hash::make($new_pass);
                        $objectUpdate->save();

                        return Response::json($objectUpdate, 200);
                    }else{
                        $returnData = array(
                            'status' => 404,
                            'message' => 'Invalid Password'
                        );
                        return Response::json($returnData, 404);
                    }
                }
                catch (Exception $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                }
            }
            else {
                $returnData = array(
                    'status' => 404,
                    'message' => 'No record found'
                );
                return Response::json($returnData, 404);
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
        $objectSee = Users::find($id);
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
        $objectUpdate = Users::find($id);
        if ($objectUpdate) {
            
            try {
                
                $objectUpdate->username         = $request->get('username', $objectUpdate->username);
                $objectUpdate->email            = $request->get('email', $objectUpdate->email);
                $objectUpdate->privileges       = $request->get('privileges', $objectUpdate->privileges);
                $objectUpdate->firstname        = $request->get('firstname', $objectUpdate->firstname);
                $objectUpdate->lastname         = $request->get('lastname', $objectUpdate->lastname);
                $objectUpdate->state            = $request->get('state', $objectUpdate->state);
                $objectUpdate->student            = $request->get('student', $objectUpdate->student);
                $objectUpdate->teacher            = $request->get('teacher', $objectUpdate->teacher);
                $objectUpdate->tutor            = $request->get('tutor', $objectUpdate->tutor);

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
        $objectDelete = Users::find($id);
        if ($objectDelete) {
            try {
                Users::destroy($id);
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
