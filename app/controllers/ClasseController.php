<?php

class ClasseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$classes=DB::table('classe')
            ->join('filieres', 'classe.filiere_id', '=', 'filieres.id')
            ->select('classe_id','nom_classe','nom_filiere','filieres.id')   
        ->get();
 		//var_dump($classes);
        return View::make('theme.pages.classe.listeclasse', ['classes'=>$classes]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.classe.addclasse');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table('classe')->insert(array('nom_classe' => Input::get('nom_classe'), 'emploi_de_temp_url' =>Input::get('emploi_de_temp_url'), 'filiere_id' =>Input::get('filiere_id'),'created_at' => new DateTime(),'updated_at' => new DateTime()));
       
       $classes=DB::table('classe')
            ->join('filieres', 'classe.classe_id', '=', 'filieres.id')
            ->select('classe_id','nom_classe','nom_filiere','filieres.id')   
        ->get();
 		//var_dump($classes);
         return View::make('theme.pages.classe.listeclasse', ['classes'=>$classes]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            $classe=DB::table('classe')
            ->join('filieres', 'classe.filiere_id', '=', 'filieres.id')
            ->select('classe_id','nom_classe','nom_filiere','filieres.id','emploi_de_temp_url')
            ->where('classe.classe_id',  $id)   
        ->first();
		
		//var_dump($classe);
		return View::make('theme.pages.classe.viewclasse')->with('classe', $classe);
	}

	public function showclass($id)
	{
		//
		$filieres=DB::table('classe')
      		->where('filiere_id',$id)  
            ->select('*')   
        ->get();
        //var_dump($filieres);
        echo '<option value="">Please select...</option>';
        foreach ($filieres as $key => $value) {
        	echo "<option value='$value->classe_id'>$value->nom_classe</option>";
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
		$classe=DB::table('classe')
            ->join('filieres', 'classe.filiere_id', '=', 'filieres.id')
            ->select('classe_id','nom_classe','nom_filiere','filiere_id','emploi_de_temp_url')
            ->where('classe.classe_id',  $id)   
        ->first();

        return View::make('theme.pages.classe.editclasse')->with('classe', $classe);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		DB::table('classe')
            ->where('classe_id', '=', $id)
            ->update(array('nom_classe' => Input::get("nom_classe"),'emploi_de_temp_url' => Input::get("emploi_de_temp_url"),'filiere_id' => Input::get("filiere_id")));
 
        return Redirect::to('/editclasse/'.$id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		DB::table('classe')
            ->where('classe.classe_id',$id)
            ->delete();
            
            
        return Redirect::to('/listclasse');
	}


}
