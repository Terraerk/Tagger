<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityRelationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entity_relations', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('source_entity_id')->unsigned();
            $table->integer('related_entity_id')->unsigned();
            $table->integer('entity_relation_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('ip_address', 255);
            $table->text('reason');
			$table->timestamps();
            
            $table->foreign('source_entity_id')->references('id')->on('entities');
            $table->foreign('related_entity_id')->references('id')->on('entities');
            $table->foreign('entity_relation_type_id')->references('id')->on('entity_relation_types');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->index('source_entity_id');
            $table->index('related_entity_id');
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
		Schema::drop('entity_relations');
	}

}
