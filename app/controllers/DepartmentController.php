<?php

class DepartmentController extends \BaseController {



	public function view($id)
	{
		$departement=DB::table('departement')
            ->join('enseignant', 'departement.responsable_id', '=', 'enseignant.id')
            ->join('utilisateur','enseignant.id','=','utilisateur.id')
            ->where('departement.id',$id)
             ->select('departement.id','departement.nom_departement','utilisateur.nom','utilisateur.prenom')
            ->first();
		//var_dump($departement);
		return View::make('theme.pages.departement.viewdepartement')->with('departement', $departement);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$departements=DB::table('departement')
            ->join('enseignant', 'departement.responsable_id', '=', 'enseignant.id')
            ->join('utilisateur','enseignant.user_id','=','utilisateur.id')
            ->select('departement.id','departement.nom_departement','utilisateur.nom','utilisateur.prenom')
            
        ->get();
 		//var_dump($departements);
        return View::make('theme.pages.departement.liste_departement', ['departements'=>$departements]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.departement.adddepartement');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table('departement')->insert(array('nom_departement' => Input::get('nom_departement'), 'responsable_id' =>Input::get('responsable_id'),'created_at' => new DateTime(),'updated_at' => new DateTime()));
       

       	$departements=DB::table('departement')
            ->join('enseignant', 'departement.responsable_id', '=', 'enseignant.id')
            ->join('utilisateur','enseignant.id','=','utilisateur.id')
            ->select('departement.id','departement.nom_departement','utilisateur.nom','utilisateur.prenom')
            
        ->get();
 		//var_dump($departements);
        return View::make('theme.pages.departement.liste_departement', ['departements'=>$departements]);
        
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$departement=DB::table('departement')
            ->join('enseignant', 'departement.responsable_id', '=', 'enseignant.id')
            ->join('utilisateur','enseignant.id','=','utilisateur.id')
            ->where('departement.id',$id)
             ->select('departement.id','departement.responsable_id','departement.nom_departement','utilisateur.nom','utilisateur.prenom')
            ->first();
            

		//var_dump($enseignant);
		return View::make('theme.pages.departement.editdepartement')->with('departement', $departement);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		DB::table('departement')
            ->where('id', '=', $id)
            ->update(array('nom_departement' => Input::get("nom_departement"),'responsable_id' => Input::get("responsable_id")));
 
        return Redirect::to('/editdepartment/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('departement')
            ->where('departement.id',$id)
            ->delete();
            
            
        return Redirect::to('/listdepartment');
	}


}
