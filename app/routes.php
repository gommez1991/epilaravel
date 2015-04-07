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
Route::get('ahmed/{n}', function($n) { return 'Je suis la page ' . $n . ' !'; });

App::missing(function(){return '440';});