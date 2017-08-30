<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('charges', 'ChargesController');
Route::resource('cycles', 'CyclesController');
Route::resource('events', 'EventsController');
Route::resource('eventstypes', 'Events_TypesController');
Route::resource('grades', 'GradesController');
Route::resource('gradessubjects', 'Cycles_Studying_Days_Grades_SubjectsController');
Route::resource('homeworks', 'HomeworksController');
Route::resource('inscriptions', 'InscriptionsController');
Route::resource('students', 'StudentsController');
Route::resource('studyingdays', 'Studying_DaysController');
Route::resource('subjects', 'SubjectsController');
Route::resource('teachers', 'TeachersController');
Route::resource('teachersassistance', 'Teachers_AssistanceController');
Route::resource('tutors', 'TutorsController');
Route::resource('studentsassistance', 'Students_AssistanceController');
Route::resource('users', 'UsersController');
Route::resource('userstypes', 'Users_TypesController');

Route::get('grades/{id}/subjects', 'Cycles_Studying_Days_Grades_SubjectsController@getGradesSubjects');
Route::get('students/{id}/charges', 'ChargesController@getInscriptionsCharges');

Route::post('charges/signedup', 'ChargesController@setCharges');
Route::post('charges/update', 'ChargesController@setChargesUpdate');
Route::post('homeworks/signedup', 'HomeworksController@setHomeworks');
Route::post('homeworks/update', 'HomeworksController@setHomeworksUpdate');
Route::post('subjects/signedup', 'Cycles_Studying_Days_Grades_SubjectsController@setGrades_Subjects');
Route::post('users/{id}/changepassword', 'UsersController@changePassword');
Route::post('users/signedup', 'Users_StudentsController@setUsers_Students');

Route::post('login', 'AuthenticateController@login');
Route::get('logout', 'AuthenticateController@logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
