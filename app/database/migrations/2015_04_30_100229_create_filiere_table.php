<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiliereTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filieres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("nom_filiere");
			$table->integer('department_id')->unsigned();
			$table->timestamps();
			$table->foreign('department_id')->references('id')->on('departement');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filieres');
	}

}
