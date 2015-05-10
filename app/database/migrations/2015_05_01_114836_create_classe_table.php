<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classe', function(Blueprint $table)
		{
			$table->increments('classe_id');
			$table->string("nom_classe");
			$table->string("emploi_de_temp_url");
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
		Schema::drop('classe');
	}

}
