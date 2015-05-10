<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departement', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("nom_departement");
			$table->integer('responsable_id')->unsigned();
			$table->timestamps();
			$table->foreign('responsable_id')->references('id')->on('enseignant');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('departement');
	}

}
