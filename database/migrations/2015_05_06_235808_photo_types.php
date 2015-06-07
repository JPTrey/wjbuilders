<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhotoTypes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('photos', function($table) {
			$table->boolean('house');
			$table->boolean('gallery');
			$table->boolean('banner');
			$table->dropColumn('type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photos', function($table) {
			$table->dropColumn('house');
			$table->dropColumn('gallery');
			$table->dropColumn('banner');
			$table->text('type');
		});
	}

}
