<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entity_tags', function(Blueprint $table)
		{
			$table->integer('tag_id')->unsigned();
			$table->integer('entity_id')->unsigned();
            
            $table->unique(array('tag_id', 'entity_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entity_tags');
	}

}
