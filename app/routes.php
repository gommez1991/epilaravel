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
//gestion d'etudiant
Route::get('/liststudents', 'StudentController@index');
Route::get('/viewstudent/{n}',array('uses'=>'StudentController@view', 'as'=>'std.view'));
Route::get('/deletestudent/{n}',array('uses'=>'StudentController@destroy', 'as'=>'std.destroy'));
Route::get('/editstudent/{n}',array('uses'=>'StudentController@edit', 'as'=>'std.edit'));
Route::post('/editstudent/{n}',array('uses'=>'StudentController@update', 'as'=>'std.update'));
Route::get('/addstudent',array('uses'=>'StudentController@create', 'as'=>'std.create'));
Route::post('/addstudent',array('uses'=>'StudentController@store', 'as'=>'std.store'));
//getsion enseignants
Route::resource('/listenseignant', 'EnseignantController');
Route::get('/viewenseignant/{n}',array('uses'=>'EnseignantController@view', 'as'=>'ens.view'));
Route::get('/deleteenseignant/{n}',array('uses'=>'EnseignantController@destroy', 'as'=>'ens.destroy'));
Route::get('/editenseignant/{n}',array('uses'=>'EnseignantController@edit', 'as'=>'ens.edit'));
Route::post('/editenseignant/{n}',array('uses'=>'EnseignantController@update', 'as'=>'ens.update'));
Route::get('/addenseignant',array('uses'=>'EnseignantController@create', 'as'=>'ens.create'));
Route::post('/addenseignant',array('uses'=>'EnseignantController@store', 'as'=>'ens.store'));
//gestion departement
Route::resource('/listdepartment', 'DepartmentController');
Route::get('/viewdepartment/{n}',array('uses'=>'DepartmentController@view', 'as'=>'dep.view'));
Route::get('/deletedepartment/{n}',array('uses'=>'DepartmentController@destroy', 'as'=>'dep.destroy'));
Route::get('/editdepartment/{n}',array('uses'=>'DepartmentController@edit', 'as'=>'dep.edit'));
Route::post('/editdepartment/{n}',array('uses'=>'DepartmentController@update', 'as'=>'dep.update'));
Route::get('/adddepartment',array('uses'=>'DepartmentController@create', 'as'=>'dep.create'));
Route::post('/adddepartment',array('uses'=>'DepartmentController@store', 'as'=>'dep.store'));
//gestion filiere
Route::resource('/listfiliere', 'FiliereController');
Route::get('/viewfiliere/{n}',array('uses'=>'FiliereController@view', 'as'=>'fil.view'));
Route::get('/deletefiliere/{n}',array('uses'=>'FiliereController@destroy', 'as'=>'fil.destroy'));
Route::get('/editfiliere/{n}',array('uses'=>'FiliereController@edit', 'as'=>'fil.edit'));
Route::post('/editfiliere/{n}',array('uses'=>'FiliereController@update', 'as'=>'fil.update'));
Route::get('/addfiliere',array('uses'=>'FiliereController@create', 'as'=>'fil.create'));
Route::post('/addfiliere',array('uses'=>'FiliereController@store', 'as'=>'fil.store'));
Route::get('/showfiliere/{n}', array('uses'=>'FiliereController@show', 'as'=>'fil.ss'));


//gestion  de classe
Route::resource('/listclasse', 'ClasseController');
Route::get('/viewclasse/{n}',array('uses'=>'ClasseController@show', 'as'=>'cla.view'));
Route::get('/deleteclasse/{n}',array('uses'=>'ClasseController@destroy', 'as'=>'cla.destroy'));
Route::get('/editclasse/{n}',array('uses'=>'ClasseController@edit', 'as'=>'cla.edit'));
Route::post('/editclasse/{n}',array('uses'=>'ClasseController@update', 'as'=>'cla.update'));
Route::get('/addclasse',array('uses'=>'ClasseController@create', 'as'=>'cla.create'));
Route::post('/addclasse',array('uses'=>'ClasseController@store', 'as'=>'cla.store'));
Route::get('/showclasse/{n}', array('uses'=>'ClasseController@showclass', 'as'=>'cla.ss'));

//gestion  de matiere
Route::resource('/listmatiere', 'MatiereController');
Route::get('/viewmatiere/{n}',array('uses'=>'MatiereController@show', 'as'=>'mat.view'));
Route::get('/deletematiere/{n}',array('uses'=>'MatiereController@destroy', 'as'=>'mat.destroy'));
Route::get('/editmatiere/{n}',array('uses'=>'MatiereController@edit', 'as'=>'mat.edit'));
Route::post('/editmatiere/{n}',array('uses'=>'MatiereController@update', 'as'=>'mat.update'));
Route::get('/addmatiere',array('uses'=>'MatiereController@create', 'as'=>'mat.create'));
Route::post('/addmatiere',array('uses'=>'MatiereController@store', 'as'=>'mat.store'));
Route::get('/showmatieres/{n}', array('uses'=>'MatiereController@showmatiere', 'as'=>'cla.ss'));



//gestion de notes
Route::resource('/listnote', 'NoteController');
Route::get('/viewnote/{n}',array('uses'=>'NoteController@show', 'as'=>'not.view'));
Route::get('/deletenote/{n}',array('uses'=>'NoteController@destroy', 'as'=>'not.destroy'));
Route::get('/editnote/{m}/{u}',array('uses'=>'NoteController@edit', 'as'=>'not.edit'));
Route::post('/editnote/{m}/{u}',array('uses'=>'NoteController@update', 'as'=>'not.update'));
Route::get('/addnote',array('uses'=>'NoteController@create', 'as'=>'not.create'));
Route::post('/addnote',array('uses'=>'NoteController@store', 'as'=>'not.store'));
Route::get('/getlistdatanote/{m}/{c}/{f}',array('uses'=>'NoteController@getlistdatanote', 'as'=>'not.list'));
Route::get('/getlistformnote/{c}',array('uses'=>'NoteController@getlistformnote', 'as'=>'not.listf'));



//gestion des evenements
Route::get('/gestevents',function(){return View::make("theme.pages.calendar");});


//Route::get("viewstudent/{n}",function($n){return View::make("theme.pages.etudiants.viewstudent", ['user'=>$n]);});
App::missing(function(){return '440 not found :p';});
//Route::post('/show',array('uses'=>'FiliereController@show', 'as'=>'fil.ss'));

