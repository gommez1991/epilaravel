<?php

class FiliereController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filieres=DB::table('filieres')
            ->join('departement', 'filieres.department_id', '=', 'departement.id')
            ->select('filieres.id','filieres.nom_filiere','departement.nom_departement')   
        ->get();
 		//var_dump($filiere);
        return View::make('theme.pages.filiere.liste_filiere', ['filieres'=>$filieres]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.filiere.addfiliere');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table('filieres')->insert(array('nom_filiere' => Input::get('nom_filiere'), 'department_id' =>Input::get('department_id'),'created_at' => new DateTime(),'updated_at' => new DateTime()));
       $filieres=DB::table('filieres')
            ->join('departement', 'filieres.department_id', '=', 'departement.id')
            ->select('filieres.id','filieres.nom_filiere','departement.nom_departement')   
        ->get();
 		//var_dump($filiere);
        return View::make('theme.pages.filiere.liste_filiere', ['filieres'=>$filieres]);
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
		$filieres=DB::table('filieres')
      		->where('department_id',$id)  
            ->select('*')   
        ->get();
        //var_dump($filieres);
        echo '<option value="">Please select...</option>';
        foreach ($filieres as $key => $value) {
        	echo "<option value='$value->id'>$value->nom_filiere</option>";
        }

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$filiere=DB::table('filieres')
            ->join('departement', 'filieres.department_id', '=', 'departement.id')
            ->select('filieres.id','filieres.nom_filiere','departement.nom_departement','filieres.department_id') 
            ->where('filieres.id',$id)  
			->first();
 		//var_dump($filiere);
        return View::make('theme.pages.filiere.editfiliere', ['filiere'=>$filiere]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::table('filieres')
            ->where('id', '=', $id)
            ->update(array('nom_filiere' => Input::get("nom_filiere"),'department_id' => Input::get("department_id")));
 
        return Redirect::to('/editfiliere/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('filieres')
            ->where('filieres.id',$id)
            ->delete();
            
            
        return Redirect::to('/listfiliere');
	}


}
