<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityScoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entity_scores', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('entity_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ip_address', 255);
            $table->integer('score');
			$table->timestamps();
            
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->index('entity_id');
            $table->index('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entity_ratings');
	}

}
