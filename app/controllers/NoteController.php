<?php

class NoteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('theme.pages.notes.listnote');
	}

	public function getlistdatanote($m,$c,$f)
	{

		$utilisateurs=DB::table('utilisateur')
		
			 ->join('inscrit', 'utilisateur.id', '=', 'inscrit.user_id')
			->join('classe', 'inscrit.classe_id', '=', 'classe.classe_id')
            ->join('filieres', 'classe.filiere_id', '=', 'filieres.id')
            ->join('matiere', 'filieres.id', '=', 'matiere.filiere_id')
            ->join('type_matiere', 'matiere.id_matiere', '=', 'type_matiere.id_matiere')
            ->join('notes','type_matiere.id_matiere','=','type_matiere.id_matiere')	
            ->where('notes.id_matiere', '=', $m)
            ->where('classe.classe_id', '=', $c)
            ->where('filieres.id', '=', $f)
            ->select('notes.id_matiere','utilisateur.id','utilisateur.nom','utilisateur.prenom') 
            ->distinct()  
        ->get();

         //
                                         
        //var_dump($utilisateurs);
        //echo "<table border=1>";
        foreach ($utilisateurs as $key => $value) {
        	$action='<a  href="editnote/'.$value->id_matiere.'/'.$value->id.'"><button title="Modifier" type="button" class="btn btn-info btn-flat  fa fa-edit"></button></a>';
        	$nom_pnom=$value->nom." ".$value->prenom;
        		$not_tp=DB::table('notes')
        		->where("notes.user_id",$value->id)
        		->where("notes.examen","TP")
        		->select('notes.note') 
        		->get();
        		
        		//var_dump($not_tp);
        		
        		$not_ds=DB::table('notes')
        		->where("notes.user_id",$value->id)
        		->where("notes.examen","DS")
        		->select('notes.note') 
        		->get();
        		//var_dump($not_tp);
        		
        		
        		$not_exam=DB::table('notes')
        		->where("notes.user_id",$value->id)
        		->where("notes.examen","EX")
        		->select('notes.note') 
        		->get();
        		//var_dump($not_tp);
        		
        		
        		if ($not_tp==null) {
        			$not_tp="--";
        		}
        		else{
        			foreach ($not_tp as $key => $notp) {
        				$not_tp=$notp->note;
        			};
        		}
        		if ($not_ds==null) {
        			$not_ds="--";
        		} else {
        			
        			foreach ($not_ds as $key => $notds) {
        				$not_ds=$notds->note;
        			}
        		}
        		if ($not_exam==null) {
        			$not_exam="--";
        		} else {
        			foreach ($not_exam as $key => $notexm) {
        			 $not_exam=$notexm->note;
        			}
        		}	
        		echo "<tr>";
	        	echo "<td>$nom_pnom</td>";
	        	echo "<td>$not_tp</td>";
	        	echo "<td>$not_ds</td>";
	        	echo "<td>$not_exam</td>";
	        	echo "<td>$action</td>";
	        	echo "</tr>";
        	}
        	
        
        // echo "</table>";
        //return View::make('theme.pages.notes.listnote');
	}

    public function getlistformnote($c)
    {
        $etudiant=DB::table('utilisateur')
            ->join('etudiant', 'utilisateur.id', '=', 'etudiant.user_id')
            ->join('inscrit','etudiant.user_id', '=','inscrit.user_id')
            ->join('classe','inscrit.classe_id', '=','classe.classe_id')
            ->where('inscrit.classe_id','=',$c)
            ->select('utilisateur.nom', 'utilisateur.prenom')
        ->get();
        //var_dump($etudiant);
echo "<table border=1>";
$i=0;
        foreach ($etudiant as $key => $value) {
            echo "<tr>";
            echo "<td>$value->nom $value->prenom</td>";
            echo "<td><input type=number step = 'any'  min ='0' max='20' class='form-control' name=note_ds_$i></td>";
            echo "<td><input type=number step = 'any'  min ='0' max='20'  class='form-control' name=note_tp_$i></td>";
            echo "<td><input type=number step = 'any'  min ='0' max='20' class='form-control' name=note_exam_$i></td>";
            echo "</tr>";
            $i++;
        }
echo "</table>";
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('theme.pages.notes.addnote');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $id_classes=Input::get("id_classes");
		$etudiant=DB::table('utilisateur')
            ->join('etudiant', 'utilisateur.id', '=', 'etudiant.user_id')
            ->join('inscrit','etudiant.user_id', '=','inscrit.user_id')
            ->join('classe','inscrit.classe_id', '=','classe.classe_id')
            ->where('inscrit.classe_id','=',$id_classes)
            ->select('etudiant.user_id','utilisateur.nom', 'utilisateur.prenom')
        ->get();
//var_dump($etudiant);
$i=0;
        foreach ($etudiant as $key => $value) 
        {
            DB::table('notes')->insert(array(
                    'user_id' => $value->user_id,
                    'id_matiere' =>Input::get('id_matiere'), 
                    'note' =>Input::get('note_ds_'.$i),
                    'date'=>new DateTime(),
                    'examen'=> "DS",
                    'sessioon'=> "pincipal",
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime())
            );
            DB::table('notes')->insert(array(
                    'user_id' => $value->user_id,
                    'id_matiere' =>Input::get('id_matiere'), 
                    'note' =>Input::get('note_tp_'.$i),
                    'date'=>new DateTime(),
                    'examen'=> "TP",
                    'sessioon'=> "pincipal",
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime())
            );
            DB::table('notes')->insert(array(
                    'user_id' => $value->user_id,
                    'id_matiere' =>Input::get('id_matiere'), 
                    'note' =>Input::get('note_exam_'.$i),
                    'date'=>new DateTime(),
                    'examen'=> "EX",
                    'sessioon'=> "pincipal",
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime())
            );
            $i++;
        }
        return View::make('theme.pages.notes.listnote');

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
	public function edit($m,$u)
	{

		$note=DB::table('utilisateur')
		
			 ->join('inscrit', 'utilisateur.id', '=', 'inscrit.user_id')
			->join('classe', 'inscrit.classe_id', '=', 'classe.classe_id')
            ->join('filieres', 'classe.filiere_id', '=', 'filieres.id')
            ->join('matiere', 'filieres.id', '=', 'matiere.filiere_id')
            ->join('type_matiere', 'matiere.id_matiere', '=', 'type_matiere.id_matiere')
            ->join('notes','type_matiere.id_matiere','=','type_matiere.id_matiere')	
            ->where('matiere.id_matiere', '=', $m)
           	->where('utilisateur.id', '=', $u)
            ->select('notes.id_matiere','matiere.nom_matiere','utilisateur.id','utilisateur.nom','utilisateur.prenom') 
            ->distinct()  
        ->get();
        $not_tp=DB::table('notes')
        		->where("notes.user_id",$note[0]->id)
        		->where("notes.examen","TP")
        		->select('notes.note') 
        		->get();
        $not_ds=DB::table('notes')
        		->where("notes.user_id",$note[0]->id)
        		->where("notes.examen","DS")
        		->select('notes.note') 
        		->get();
        		//var_dump($not_tp);
        		
        		
        		$not_exam=DB::table('notes')
        		->where("notes.user_id",$note[0]->id)
        		->where("notes.examen","EX")
        		->select('notes.note') 
        		->get();
        		//var_dump($not_tp);
        		
        		
        		if ($not_tp==null) {
        			$not_tp="--";
        		}
        		else{
        			foreach ($not_tp as $key => $notp) {
        				$not_tp=$notp->note;
        			};
        		}
        		if ($not_ds==null) {
        			$not_ds="--";
        		} else {
        			
        			foreach ($not_ds as $key => $notds) {
        				$not_ds=$notds->note;
        			}
        		}
        		if ($not_exam==null) {
        			$not_exam="--";
        		} else {
        			foreach ($not_exam as $key => $notexm) {
        			$not_exam=$notexm->note;
        			}
        		}	
        		array_push($note,$not_ds, $not_tp, $not_exam);
        		
		
        //var_dump($note);
		return View::make('theme.pages.notes.editnote')->with('note', $note);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($m,$u)
	{
	
			DB::table('notes')
            ->where('user_id', '=', $u)
            ->where('id_matiere', '=', $m)
            ->where('examen',"DS")
            ->update(array('note' => Input::get("not_ds"),'updated_at' => new DateTime()));
		
			DB::table('notes')
            ->where('user_id', '=', $u)
            ->where('id_matiere', '=', $m)
            ->where('examen',"TP")
            ->update(array('note' => Input::get("not_tp"),'updated_at' => new DateTime()));
		
			DB::table('notes')
            ->where('user_id', '=', $u)
            ->where('id_matiere', '=', $m)
            ->where('examen',"EX")
            ->update(array('note' => Input::get("not_exam"),'updated_at' => new DateTime()));
		
		
        return Redirect::to('/listnote');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
