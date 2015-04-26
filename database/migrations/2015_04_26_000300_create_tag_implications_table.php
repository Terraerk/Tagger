<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagImplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_implications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('source_tag_id')->unsigned();
            $table->integer('implied_tag_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ip_address', 255);
            $table->text('reason');
            $table->text('descendants');
			$table->timestamps();
            
            $table->foreign('source_tag_id')->references('id')->on('tags');
            $table->foreign('implied_tag_id')->references('id')->on('tags');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->index('source_tag_id');
            $table->index('implied_tag_id');
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
		Schema::drop('tag_implications');
	}

}
