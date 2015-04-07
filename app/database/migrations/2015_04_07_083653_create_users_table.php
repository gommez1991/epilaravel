<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilisateur', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pseudo');
			$table->string('password');
			$table->string('nom');
			$table->string('prenom');
			$table->string('email');
			$table->string('sexe');
			$table->string('telephone');
			$table->string('adresse');
			$table->string('nationalite');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilisateur');
	}

}
