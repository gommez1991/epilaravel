<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@getIndex');
Route::post('/','HomeController@postIndex');
Route::get('/dashboard', function(){return View::make("theme.dashboard");});
//Route::get('/dashboard',"DashboardController@getIndex()");
Route::get("/logout","HomeController@getLogout");
Route::resource('/liststudents', 'StudentController');
Route::get('/viewstudent/{n}',array('uses'=>'StudentController@view', 'as'=>'user.view'));
Route::get('/deletestudent/{n}',array('uses'=>'StudentController@destroy', 'as'=>'user.destroy'));
Route::get('/editstudent/{n}',array('uses'=>'StudentController@edit', 'as'=>'user.edit'));
Route::post('/editstudent/{n}',array('uses'=>'StudentController@update', 'as'=>'user.update'));
Route::get('/addstudent',array('uses'=>'StudentController@create', 'as'=>'user.create'));
Route::post('/addstudent',array('uses'=>'StudentController@store', 'as'=>'user.store'));
//Route::get("viewstudent/{n}",function($n){return View::make("theme.pages.etudiants.viewstudent", ['user'=>$n]);});
App::missing(function(){return '440';});