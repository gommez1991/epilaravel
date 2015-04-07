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
        DB::table('utilisateur')->insert([
                'id'   => '',
                'pseudo'      => "pseudo_$i",
                'password'   => Hash::make("pwd_$i"),
                'nom' => "nom_$i",
                'prenom'  => "pnom_$i",
                'email'=>"email_$i@gmail.com",
                'sexe'=>"male",
                'telephone'=>"$i$i$i",
                'adresse'=>"adresse $i",
                'nationalite'=>"Tunisie",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
       }
    }
 
}
