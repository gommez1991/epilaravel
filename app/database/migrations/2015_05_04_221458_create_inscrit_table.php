<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscritTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inscrit', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('classe_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->String("annee_universitaire");
			$table->timestamps();
			$table->foreign('classe_id')->references('classe_id')->on('classe');
			$table->foreign('user_id')->references('user_id')->on('etudiant');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inscrit');
	}

}
