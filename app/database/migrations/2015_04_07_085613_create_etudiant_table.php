<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('etudiant', function(Blueprint $table)
		{
			$table->string('numero_inscrit');
			$table->integer('user_id')->unsigned();
			$table->string('url_avatar');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('utilisateur');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('etudiant');
	}

}
