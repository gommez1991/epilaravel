<?php

class StudentController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
    }
    public function view($id)
	{
		$user=DB::table('utilisateur')
            ->join('etudiant', 'utilisateur.id', '=', 'etudiant.user_id')
             ->where('utilisateur.id',  $id)
            ->first();
		
		//var_dump($user);
		return View::make('theme.pages.etudiants.viewstudent')->with('user', $user);;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//$students = Students::all();
		//$users=User::all();

		$users=DB::table('utilisateur')
            ->join('etudiant', 'utilisateur.id', '=', 'etudiant.user_id')
            ->select('*')
        ->get();
 
        return View::make('theme.pages.etudiants.liste_etudiants', ['users'=>$users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.etudiants.addstudent');
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
        DB::table('etudiant')->insert(array('numero_inscrit' => Input::get('numero_inscrit'), 'user_id' => $term_id,'created_at' => new DateTime(),'updated_at' => new DateTime()));
        $users=DB::table('utilisateur')
            ->join('etudiant', 'utilisateur.id', '=', 'etudiant.user_id')
            ->select('*')
        ->get();
        return View::make('theme.pages.etudiants.liste_etudiants', ['users'=>$users]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//$user = User::find($id);
 
        $user=DB::table('utilisateur')
            ->join('etudiant', 'utilisateur.id', '=', 'etudiant.user_id')
             ->where('utilisateur.id',  $id)
            ->first();
        return View::make('theme.pages.etudiants.editstudent', [ 'user' => $user ]);
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
		DB::table('etudiant')
            ->where('user_id', '=', $id)
            ->update(array('numero_inscrit' => Input::get("numero_inscrit"),));
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
 
        return Redirect::to('/editstudent/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Students::where('user_id', '=', $id)->delete();
		User::destroy($id);
        return Redirect::to('/liststudents');
	}


}
