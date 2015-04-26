<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagAliasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_aliases', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('source_tag_id')->unsigned();
            $table->integer('alias_tag_id')->unsigned();
            $table->string('name', 255);
            $table->integer('user_id')->unsigned();
            $table->string('ip_address', 255);
            $table->text('reason');
			$table->timestamps();
            
            $table->foreign('source_tag_id')->references('id')->on('tags');
            $table->foreign('alias_tag_id')->references('id')->on('tags');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->index('source_tag_id');
            $table->index('alias_tag_id');
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
		Schema::drop('tag_aliases');
	}

}
