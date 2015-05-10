<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeMatiereTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_matiere', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_matiere')->unsigned();
			$table->timestamps();
			$table->Double('coefficient');
			$table->Double('volume_horaire');
			$table->String('type');

			$table->foreign('id_matiere')->references('id_matiere')->on('matiere');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('type_matiere');
	}

}
