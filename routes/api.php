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
Route::resource('cyclesstudyingdays', 'Cycles_Studying_DaysController');
Route::resource('studyingdaysgrades', 'Cycles_Studying_Days_GradesController');
Route::resource('gradessubjects', 'Cycles_Studying_Days_Grades_SubjectsController');
Route::resource('subjectsteachers', 'Cycles_Studying_Days_Grades_Subjects_TeachersController');
Route::resource('events', 'EventsController');
Route::resource('eventstypes', 'Events_TypesController');
Route::resource('grades', 'GradesController');
Route::resource('gradessubjects', 'Cycles_Studying_Days_Grades_SubjectsController');
Route::resource('homeworks', 'HomeworksController');
Route::resource('inscriptions', 'InscriptionsController');
Route::resource('inscriptionsstudyingdays', 'Inscriptions_Cycles_Studying_DaysController');
Route::resource('students', 'StudentsController');
Route::resource('studentstutor', 'Tutors_StudentsController');
Route::resource('studyingdays', 'Studying_DaysController');
Route::resource('subjects', 'SubjectsController');
Route::resource('subjectsstudents', 'Subjects_StudentsController');
Route::resource('teachers', 'TeachersController');
Route::resource('teachersassistance', 'Teachers_AssistanceController');
Route::resource('tutors', 'TutorsController');
Route::resource('studentsassistance', 'Students_AssistanceController');
Route::resource('users', 'UsersController');
Route::resource('userstypes', 'Users_TypesController');

Route::get('grades/{id}/subjects', 'Cycles_Studying_Days_Grades_SubjectsController@getGradesSubjects');
Route::get('grades/{id}/students', 'Cycles_Studying_Days_GradesController@getGradesStudents');
Route::get('grades/{id}/subjects/{id2}', 'Cycles_Studying_Days_Grades_SubjectsController@getGradesSubjectsId');
Route::get('subjects/{id}/teachers', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@getGradesSubjectsTeachers');
Route::get('students/{id}/homeworks', 'Subjects_StudentsController@getSubjectsStudentsHomeworks');
Route::get('tutors/{id}/homeworks', 'Tutors_StudentsController@getTutorsStudentsHomeworks');
Route::get('teachers/{id}/homeworks', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@getGradesSubjectsTeachersHomeworks');
Route::get('subjects/{id}/homeworks', 'HomeworksController@getHomeworks');
Route::get('subjects/{id}/assistance', 'Students_AssistanceController@getAssistance');
Route::get('subjects/{id}/students', 'Subjects_StudentsController@getSubjectsStudents');
Route::get('subjects/{id}/students/{id2}', 'Subjects_StudentsController@getSubjectStudent');
Route::get('subjects/{id}/students/{id2}/report', 'Subjects_StudentsController@studentsReport');
Route::get('teachers/{id}/subjects', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@getTeachersSubjects');
Route::get('tutors/{id}/subjects', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@getTeachersSubjects');
Route::get('students/{id}/subjects', 'Subjects_StudentsController@getStudentsSubjects');
Route::get('students/{id}/subject/{id2}', 'Subjects_StudentsController@getStudentsSubject');
Route::get('students/{id}/charges', 'ChargesController@getInscriptionsCharges');
Route::get('tutors/{id}/students', 'TutorsController@getStudents');
Route::get('studyingdays/{id}/grades', 'Cycles_Studying_DaysController@getGrades');
Route::get('studyingdays/{id}/inscriptions', 'Inscriptions_Cycles_Studying_DaysController@getInscriptions');
Route::get('studyingdaysgrades/{id}/grades/{id2}', 'Cycles_Studying_Days_GradesController@getGrades');
Route::get('studentstutors/pertuto', 'TutorsController@getTutorStudents');
Route::get('students/{id}/notes', 'Subjects_StudentsController@studentsNotes');

Route::get('free/students', 'StudentsController@getFreeStudents');
Route::get('free/studentinscriptions', 'InscriptionsController@getFreeStudents');
Route::get('bussy/gradessubjects', 'Cycles_Studying_Days_Grades_SubjectsController@getBussyCycles_Studying_Days_Grades_Subjects');
Route::get('bussy/gradesstudents', 'Cycles_Studying_Days_GradesController@getBussyStudents_Cycles_Studying_Days_Grades');
Route::get('bussy/subjectsteachers', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@getBussyCycles_Studying_Days_Grades_Subjects_Teachers');
Route::get('bussy/charges', 'ChargesController@getBussyCharges');
Route::get('bussy/studyingdaysgrades', 'Cycles_Studying_Days_GradesController@getBussyCycles_Studying_Days_Grades');
Route::get('bussy/studyingdaysgrades/inscriptions', 'Inscriptions_Cycles_Studying_DaysController@getBussyInscriptions_Cycles_Studying_Days');
Route::get('bussy/tutors', 'TutorsController@getTutorBussy');
Route::get('homeworks/upload/delete/{id}', 'HomeworksController@DeleteHomework');

Route::post('charges/signedup', 'ChargesController@setCharges');
Route::post('charges/load', 'ChargesController@setChargesToStudents');
Route::post('charges/update', 'ChargesController@setChargesUpdate');
Route::post('charges/signeddown', 'ChargesController@removeCharges');
Route::post('homeworks/signedup', 'HomeworksController@setHomeworks');
Route::post('homeworks/update', 'HomeworksController@setHomeworksUpdate');
Route::post('homeworks/upload/{id}', 'HomeworksController@uploadHomework');
Route::post('users/upload/{id}', 'UsersController@uploadAvatar');
Route::post('studentstutor/signedup', 'Tutors_StudentsController@setStudents');
Route::post('studyingdaysgrades/signedup', 'Cycles_Studying_Days_GradesController@setGrades');
Route::post('gradessubjects/signedup', 'Cycles_Studying_Days_Grades_SubjectsController@setSubjects');
Route::post('inscriptionsstudyingdays/signedup', 'Inscriptions_Cycles_Studying_DaysController@setInscriptions');
Route::post('subjectsteachers/signedup', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@setTeachers');
Route::post('subjectsteachers/signeddown', 'Cycles_Studying_Days_Grades_Subjects_TeachersController@removeTeachers');
Route::post('inscriptionsstudyingdays/signeddown', 'Inscriptions_Cycles_Studying_DaysController@removeInscriptions');
Route::post('gradessubjects/signeddown', 'Cycles_Studying_Days_Grades_SubjectsController@removeSubjects');
Route::post('studyingdaysgrades/signeddown', 'Cycles_Studying_Days_GradesController@removeGrades');
Route::post('studentstutor/signeddown', 'Tutors_StudentsController@removeStudents');
Route::post('subjects/signedup', 'Cycles_Studying_Days_Grades_SubjectsController@setGrades_Subjects');
Route::post('users/{id}/changepassword', 'UsersController@changePassword');
Route::post('users/password/reset', 'UsersController@recoveryPassword');

Route::post('login', 'AuthenticateController@login');
Route::get('logout', 'AuthenticateController@logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});