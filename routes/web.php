<?php

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/events',array('uses' => 'events@read'));

Route::get('departments', function ()
{  return view('departments'); });

//getting all exams that current logged student has done
Route::get('/academic', array('uses' => 'report@exam'));

//gettimg results for posted exam_id
Route::post('/academic', array('uses' => 'report@read'));

//LOGOUT
Route::get('/logout',array('uses' => 'Auth\LoginController@logout'));
// 
// //event Notification
// Route::get('notify',array('uses' => 'eventNotify@weekTo'));
// Route::view('/events','events');
//
// //exams Notification
// Route::get('exams',array('uses' => 'examNotify@newExamAvailable'));
// Route::view('/academic','academic');
