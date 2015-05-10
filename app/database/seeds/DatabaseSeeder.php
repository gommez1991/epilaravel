<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}
}

class UserTableSeeder extends Seeder {
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('utilisateur')->delete();
       DB::table('etudiant')->delete();
       DB::table('classe')->delete();
       DB::table('enseignant')->delete();
      
       DB::table('utilisateur')->insert([
                'id'   => '1',
                'pseudo'      => 'admin',
                'password'   => Hash::make('admin'),
                'nom' => 'ahmed',
                'prenom'  => 'hadj ammar',
                'email'=>'gommez1991@gmail.com',
                'sexe'=>'male',
                'telephone'=>'+216 21 342 072',
                'adresse'=>'Alkadissia nadour 5031 Ksibet elmedouni Monastir',
                'nationalite'=>'Tunisie',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
    
       for ($i=0; $i <100 ; $i++) { 
           # code...
        $sexe= array('male','femelle' );
            $k = array_rand($sexe);
            $rand_sexe = $sexe[$k];
        DB::table('utilisateur')->insert([
                'id'   => '',
                'pseudo'      => "pseudo_$i",
                'password'   => Hash::make("pwd_$i"),
                'nom' => "nom_$i",
                'prenom'  => "pnom_$i",
                'email'=>"email_$i@gmail.com",
                'sexe'=>"$rand_sexe",
                'telephone'=>"$i$i$i",
                'adresse'=>"adresse $i",
                'nationalite'=>"Tunisie",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }

        for ($i=2; $i <50 ; $i+=2) { 
           # code...
            $avatar_array = array('avatar1','avatar2','avatar3','avatar4','avatar5');
             $k = array_rand($avatar_array);
            $rand_avatar = $avatar_array[$k];
        DB::table('etudiant')->insert([
                'numero_inscrit'   => "$i$i$i$i$i",
                'user_id'      => "$i",
                'url_avatar'   => "img/$rand_avatar.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
       }
       for ($i=1; $i <30 ; $i+=2) { 
           # code...
            DB::table('enseignant')->insert([
                'id'   => "",
                'user_id'      => "$i",
                'grade'   => "maître assistant",
                'etat'=>"active",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
       }

       //table classe
       /*
       $url_emploi=array("emploi1.png","emploi2.png","emploi3.png","emploi4.png","emploi5.png","emploi6.png");
       $array_spis=array("","G.info","G.indus","G.meca","G.elec");
       for ($i=1; $i < 6; $i++) { 
           # code...
        for ($j=1; $j < 4; $j++) { 
            # code...
            $nom_classe="$array_spis[$j]$j";
            if ($i<3) {
                # code...
                $nom_classe="prepa$j";
            }
            $k = array_rand($url_emploi);
            $rand_emploi = $url_emploi[$k];
            DB::table('classe')->insert([
                'id'   => "",
                'nom_classe'      => "$i$nom_classe",
                'emploi_de_temp_url'   => "img/$rand_emploi",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
        */
       
       //table departement
       DB::table('departement')->insert([
                'id'   => "",
                'nom_departement'      => "informatique",
                'responsable_id'   => "1",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);

       

 }
}
