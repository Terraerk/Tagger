<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagRelationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_relations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('source_tag_id')->unsigned();
            $table->integer('related_tag_id')->unsigned();
            $table->integer('tag_relation_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ip_address', 255);
            $table->text('reason');
			$table->timestamps();
            
            $table->foreign('source_tag_id')->references('id')->on('tags');
            $table->foreign('related_tag_id')->references('id')->on('tags');
            $table->foreign('tag_relation_type_id')->references('id')->on('tag_relation_types');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->index('source_tag_id');
            $table->index('related_tag_id');
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
		Schema::drop('tag_relations');
	}

}
