<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        
        
		Schema::create('tags', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 255);
            $table->text('definition');
            $table->integer('tag_type_id')->unsigned();
            $table->integer('count');
			$table->timestamps();
            
            $table->index('name');
            $table->index('tag_type_id');
            
            $table->foreign('tag_type_id')->references('id')->on('tag_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
	}

}
