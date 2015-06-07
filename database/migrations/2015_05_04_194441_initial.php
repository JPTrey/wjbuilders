<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('house_id');
			$table->string('location')->unique();
			$table->string('type');
			$table->boolean('featured');
			$table->string('featured_text')->nullable();
			$table->string('gallery_link')->nullable();
			$table->timestamps();
		});
		
		Schema::create('houses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('type');
			$table->string('preview_img');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photos');
		Schema::drop('houses');
	}

}
