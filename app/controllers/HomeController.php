<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
 
    public function getIndex()
    {
        return View::make('theme.login');
    }
 
    public function postIndex()
    {
        $pseudo = Input::get('pseudo');
        $motDePass = Input::get('motDePass');
        $user=DB::table('utilisateur')
             ->where('utilisateur.pseudo', $pseudo)
            ->first();
            //var_dump($user);
       	if (Auth::attempt(array('pseudo' => $pseudo, 'password' => $motDePass )))
        {
            Session::flush();
            Session::push('user', $user);
            //var_dump(Session::get('user'));
           	return Redirect::intended('dashboard');
        }
        return Redirect::back()
        ->withInput()
        ->withErrors('Le pseudo et la mot de passe que vous saisie sont invalide');
    }
 
    public function getLogin()
    {
        return Redirect::to('/');
    }
 
    public function getLogout()
    {
        Auth::logout();
 
        return Redirect::to('/');
    }

}
