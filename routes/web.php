<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\studentcontroller;
use App\Http\Controllers\adfaculty;
 use App\Http\Controllers\quizattempt;
 use App\Http\Controllers\loginactivity;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[loginactivity::class,'create']);//login and home page for all user
Route::post('/logging',[loginactivity::class,'check']);//login checking
Route::get('/studentadd',[studentcontroller::class,'create']);//student registeration ui view
Route::post('/studentadd',[studentcontroller::class,'store']);//student get registered 
Route::get('/facultyadd',[adfaculty::class,'create']);//faculty add ui view by admin
Route::post('/facultyadd',[adfaculty::class,'store']);//faculty added by admin
Route::get('/addadmin',[admincontroller::class,'createad']);
Route::post('/addadmin',[admincontroller::class,'addad']);
Route::get('/sessiondelete',function(){
    if(session()->has('sname'))
    {
        session()->pull('sname');
    }
    return view('index');
});//to delete a students session
Route::group(['middleware'=>['LoginCheck']], function(){

Route::get('/questionadd',[admincontroller::class,'create']);//faculty adding questions ui page showing
Route::post('/questionadd',[admincontroller::class,'store']);//faculty adding questions 
Route::get('/viewquestion',[admincontroller::class,'index']);//faculty viewing questions
Route::get('/editview/{id}',[admincontroller::class,'edit']);//faculty editview of questions
Route::post('/update/{id}',[admincontroller::class,'update']);//faculty editing questions
Route::get('/deleteview/{id}',[admincontroller::class,'deleteview']);//faculty deleting view
Route::post('/delete/{id}',[admincontroller::class,'destroy']);//faculty delete questions
Route::get('/viewstudent',[admincontroller::class,'indexstud']);//student view by faculty
Route::get('/facultyadd',[adfaculty::class,'create']);//faculty add ui view by admin
Route::post('/facultyadd',[adfaculty::class,'store']);//faculty added by admin
Route::get('/viewfaculty',[adfaculty::class,'index']);//faculty view by admin
Route::get('/editfacultyview/{id}',[adfaculty::class,'edit']);//faculty editview by admin
Route::post('/updatefaculty/{id}',[adfaculty::class,'update']);//faculty delete by admin
Route::get('/deletefacultyview/{id}',[adfaculty::class,'deleteview']);//faculty delete view by admin
Route::post('/deletefaculty/{id}',[adfaculty::class,'updatestatus']);//faculty changing status to 0 by admin
Route::get('/addschedule',[adfaculty::class,'createsch']);//schedule add ui view by faculty
Route::post('/addschedule1',[adfaculty::class,'storesch']);//schedule adding by facilty
Route::get('/viewschedule',[adfaculty::class,'indextest']);//schedule view by faculty
Route::get('/deleteviewschedule/{id}',[adfaculty::class,'deletesch']);//schedule delete view by faculty
Route::post('/deleteschedule/{id}',[adfaculty::class,'destoysch']);//schedule deleting by faculty
Route::get('/scheduleview',[studentcontroller::class,'search']);//student viewing of schedule
Route::post('/attemptquiz',[quizattempt::class,'index']);//student attempting quiz
Route::post('/mark',[quizattempt::class,'store']);//calculate the mark 
Route::get('/addfeedback',[studentcontroller::class,'createfeedback']);//student adding feedback view
Route::post('/addfeedback',[studentcontroller::class,'storefeedback']);//student adding feedback
Route::get('/viewfeedback',[adfaculty::class,'indexfeedback']);//admin views feedback
Route::get('/viewmark',[quizattempt::class,'store']);//to view the students attempted mark
Route::get('/createshow',[quizattempt::class,'indexshow']);//showing answers to students
Route::get('/studmark',[studentcontroller::class,'index']);//showing their previous marks
Route::post('/report',[admincontroller::class,'search']);//result report generation by faculty
});