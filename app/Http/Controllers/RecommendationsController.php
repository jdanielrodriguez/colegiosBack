<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recommendations;
use App\Subjects_Students;
use Response;
use Validator;
use DB;
use Storage;

class RecommendationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(Recommendations::groupby('name')->get(), 200);
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
            'subject_student'   => 'required'
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
                $newObject = new Recommendations();
                $newObject->name           = $request->get('name');
                $newObject->description    = $request->get('description');
                $newObject->subject_student= $request->get('subject_student');
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
    public function setRecommendations(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'description'   => 'required',
            'students_subjects'   => 'required'
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
            try
            {
                $name = $request->get('name');
                $description = $request->get('description');
                if ( $request->get('students_subjects') )
                {
                    DB::beginTransaction();
                    $homeworkArray = $request->get('students_subjects');
                    $ids = [];
                   foreach ($homeworkArray as $value)
                    {
                        $registro = new Recommendations();
                        $registro->name           = $name;
                        $registro->description    = $description;
                        $registro->subject_student= $value['id'];
                        $registro->save();
                        array_push($ids,["id"=>$registro->id]);
                    }
                    
                    DB::commit();
                    $returnData = array (
                        'status' => 200,
                        'message' => "success"
                    );
                    return Response::json($ids, 200);
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
        
    }

    public function setRecommendationsUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameid'          => 'required',
            'dateid'          => 'required',
            'valueid'          => 'required'
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
            $objectSee = Recommendations::whereRaw('name=?',[$request->get('nameid')])->get();
            if ($objectSee) {
                DB::beginTransaction();
                foreach ($objectSee as $value){
                    $objectUpdate = Recommendations::find($value->id);
                    if ($objectUpdate) {
                        try {
                            $objectUpdate->name          = $request->get('name', $objectUpdate->name);
                            $objectUpdate->description   = $request->get('description', $objectUpdate->description);
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
                    else {
                        DB::rollback();
                        $returnData = array (
                            'status' => 407,
                            'message' => 'No record found'
                        );
                        return Response::json($returnData, 407);
                    }
                }
                
                DB::commit();
                $returnData = array (
                    'status' => 200,
                    'message' => "success"
                );
                return Response::json($returnData, 200);
            
            }
            else {
                $returnData = array (
                    'status' => 405,
                    'message' => 'No record found'
                );
                return Response::json($returnData, 405);
            }
        }
    }
    public function getSujectsRecommendations(Request $request,$id)
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
            $Recommendations = Recommendations::whereIn('note',$objectSee)->get();
            return Response::json($Recommendations, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function getInscriptionsRecommendations(Request $request,$id)
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
            $Recommendations = Recommendations::whereIn('note',$objectSee)->get();
            return Response::json($Recommendations, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function getNoteRecommendations($id)
    {
        $objectSee = Recommendations::where('note',$id)->get();
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
    public function getRecommendations($id){
        $objectSee = Subjects_Students::where('cycle_study_day_grade_subject',$id)->with('students')->with('assistance')->with('recommendations')->first();
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
    public function uploadRecommendation(Request $request, $id) {
        $objectUpdate = Recommendations::find($id);
        if ($objectUpdate) {

            $validator = Validator::make($request->all(), [
                'avatar'      => 'required'
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
                try {
                    $path = Storage::disk('s3')->put('files', $request->avatar);

                    $objectUpdate->file = Storage::disk('s3')->url($path);
                    $objectUpdate->file2 = $request->get('description',null);
                    $objectUpdate->save();

                    return Response::json($objectUpdate, 200);
                }
                catch (Exception $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                }

            }

            return Response::json($objectUpdate, 200);
        }
        else {
            $returnData = array(
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }
    public function DeleteRecommendation($id) {
        $objectUpdate = Recommendations::whereRaw('id=?',[$id])->first();
        if ($objectUpdate) {
                try {

                    $objectUpdate->file = null;
                    $objectUpdate->save();

                    return Response::json($objectUpdate, 200);
                }
                catch (Exception $e) {
                    $returnData = array(
                        'status' => 500,
                        'message' => $e->getMessage()
                    );
                }
            return Response::json($objectUpdate, 200);
        }
        else {
            $returnData = array(
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }
    public function getRecommendationsFilters(Request $request,$id)
    {
        if($request->get('filter')=='entregadas'){
            $objectSee = Subjects_Students::whereRaw('cycle_study_day_grade_subject=? and set_date!=null',$id)->with('students')->with('assistance')->with('recommendations')->first();
        }else
        if($request->get('filter')=='porentregar'){
            $objectSee = Subjects_Students::whereRaw('cycle_study_day_grade_subject=? and set_date=null',$id)->with('students')->with('assistance')->with('recommendations')->first();
        }else {
            $objectSee = Subjects_Students::whereRaw('cycle_study_day_grade_subject=?',$id)->with('students')->with('assistance')->with('recommendations')->first();
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objectSee = Recommendations::find($id);
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
        $objectUpdate = Recommendations::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->state         = $request->get('state', $objectUpdate->state);
                $objectUpdate->name          = $request->get('name', $objectUpdate->name);
                $objectUpdate->description   = $request->get('description', $objectUpdate->description);
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
        $objectDelete = Recommendations::find($id);
        if ($objectDelete) {
            try {
                Recommendations::destroy($id);
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