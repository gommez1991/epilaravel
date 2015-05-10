<?php

class MatiereController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$matieres=DB::table('type_matiere')
			->join('matiere', 'type_matiere.id_matiere', '=', 'matiere.id_matiere')
            ->join('filieres', 'matiere.filiere_id', '=', 'filieres.id')
            ->join('departement', 'filieres.department_id', '=', 'departement.id')
            ->select('*')   
        ->get();
 		//var_dump($matieres);
        return View::make('theme.pages.matieres.listmatiere', ['matieres'=>$matieres]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.matieres.addmatiere');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table('matiere')->insert(array('nom_matiere'=>Input::get("nom_matiere"),'filiere_id' => Input::get("filiere_id"),'created_at' => new DateTime(),'updated_at' => new DateTime()));
		$id = DB::table('matiere')->max('id_matiere');
		DB::table('type_matiere')->insert(array('id_matiere'=>$id,'coefficient'=>Input::get("coefficient"),'volume_horaire'=> Input::get("volume_horaire"),'type' => Input::get("type"),'created_at' => new DateTime(),'updated_at' => new DateTime()));
   		 return Redirect::to('/listmatiere');

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


public function showmatiere($id)
	{
		//
		$filieres=DB::table('matiere')
      		->where('filiere_id',$id)  
            ->select('*')   
        ->get();
        //var_dump($filieres);
        echo '<option value="">Please select...</option>';
        foreach ($filieres as $key => $value) {
        	echo "<option value='$value->id_matiere'>$value->nom_matiere</option>";
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
		$matiere=DB::table('type_matiere')
			->join('matiere', 'type_matiere.id_matiere', '=', 'matiere.id_matiere')
            ->join('filieres', 'matiere.filiere_id', '=', 'filieres.id')
            ->join('departement', 'filieres.department_id', '=', 'departement.id')
            ->select('*') 
            ->where('matiere.id_matiere',  $id)   
        ->first();

        return View::make('theme.pages.matieres.editmatiere')->with('matiere', $matiere);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::table('matiere')
            ->where('matiere.id_matiere', '=', $id)
            ->update(array('nom_matiere'=>Input::get("nom_matiere"),'filiere_id' => Input::get("filiere_id"),'created_at' => new DateTime(),'updated_at' => new DateTime()));
 		DB::table('type_matiere')
            ->where('type_matiere.id_matiere', '=', $id)
            ->update(array('id_matiere'=>$id,'coefficient'=>Input::get("coefficient"),'volume_horaire'=> Input::get("volume_horaire"),'type' => Input::get("type"),'created_at' => new DateTime(),'updated_at' => new DateTime()));
 
        return Redirect::to('/editmatiere/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('matiere')
            ->where('matiere.id_matiere',$id)
            ->delete();
            
            
        return Redirect::to('/listmatiere');
	}


}
