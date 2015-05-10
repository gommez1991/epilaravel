<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatiereTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matiere', function(Blueprint $table)
		{
			$table->increments('id_matiere');
			$table->String('nom_matiere');
			$table->integer('filiere_id')->unsigned();
			$table->timestamps();
			$table->foreign('filiere_id')->references('id')->on('filieres');

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('matiere');
	}

}
