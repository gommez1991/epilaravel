<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notes', function(Blueprint $table)
		{
			$table->increments('id_note');
			$table->integer('user_id')->unsigned();
			$table->integer("id_matiere")->unsigned();
			$table->Double('note');
			$table->Date('date');
			$table->String('examen');
			$table->String('sessioon');
			$table->timestamps();
			$table->foreign('user_id')->references('user_id')->on('etudiant');
			$table->foreign('id_matiere')->references('id')->on('type_matiere');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notes');
	}

}
