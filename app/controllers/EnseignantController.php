<?php

class EnseignantController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        //$this->beforeFilter('auth');
    }
    public function view($id)
	{
		$user=DB::table('utilisateur')
            ->join('enseignant', 'utilisateur.id', '=', 'enseignant.user_id')
             ->where('utilisateur.id',  $id)
            ->first();
		
		//var_dump($user);
		return View::make('theme.pages.enseignants.viewenseignant')->with('user', $user);
	}

	public function index()
	{
	
		$users=DB::table('utilisateur')
            ->join('enseignant', 'utilisateur.id', '=', 'enseignant.user_id')
            ->select('*')
        ->get();
 
        return View::make('theme.pages.enseignants.liste_enseignants', ['users'=>$users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.enseignants.addenseignant');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
        $user->pseudo 		= Input::get('pseudo');
        $user->password  	= Hash::make(Input::get('password'));
        $user->nom   		= Input::get('nom');
        $user->prenom      	= Input::get('prenom');
        $user->email      	= Input::get('email');
        $user->sexe      	= Input::get('sexe');
        $user->telephone    = Input::get('telephone');
        $user->adresse      = Input::get('adresse');
        $user->nationalite  = Input::get('nationalite');
        $user->save();
		$var = DB::table('utilisateur')->where('email', Input::get('email'))->select('id')->get();
        
        $tmp=array_values($var);
		$term_id=$tmp[0]->id;
		//var_dump($term_id);
        DB::table('enseignant')->insert(array('grade' => Input::get('grade'), 'user_id' => $term_id,'etat'=> Input::get('etat'),'created_at' => new DateTime(),'updated_at' => new DateTime()));
        $users=DB::table('utilisateur')
            ->join('enseignant', 'utilisateur.id', '=', 'enseignant.user_id')
            ->select('*')
        ->get();
        return View::make('theme.pages.enseignants.liste_enseignants', ['users'=>$users]);	
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $user=DB::table('utilisateur')
            ->join('enseignant', 'utilisateur.id', '=', 'enseignant.user_id')
             ->where('utilisateur.id',  $id)
            ->first();
        return View::make('theme.pages.enseignants.editenseignant', [ 'user' => $user ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		DB::table('enseignant')
            ->where('user_id', '=', $id)
            ->update(array('grade' => Input::get("grade"),'etat' => Input::get("etat")));
        $user->pseudo 		= Input::get('pseudo');
        $user->password  	= Hash::make(Input::get('password'));
        $user->nom   		= Input::get('nom');
        $user->prenom      	= Input::get('prenom');
        $user->email      	= Input::get('email');
        $user->sexe      	= Input::get('sexe');
        $user->telephone    = Input::get('telephone');
        $user->adresse      = Input::get('adresse');
        $user->nationalite  = Input::get('nationalite');
        $user->save();
 
        return Redirect::to('/editenseignant/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Enseignant::where('user_id', '=', $id)->delete();
		User::destroy($id);
        return Redirect::to('/listenseignant');
	}


}
