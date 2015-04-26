<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entities', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('entity_rating_id')->unsigned();
            $table->text('md5');
            $table->integer('width');
            $table->integer('height');
            $table->integer('filesize');
            $table->string('file_ext');
            $table->integer('entity_status_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ip_address', 255);
			$table->timestamps();
            
            $table->foreign('entity_rating_id')->references('id')->on('entity_ratings');
            $table->foreign('entity_status_id')->references('id')->on('entity_statuses');
            $table->foreign('user_id')->references('id')->on('users');
            
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
		Schema::drop('entities');
	}

}
