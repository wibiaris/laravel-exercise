<?php

use Illuminate\Database\Schema\Blueprint;


class CreateGroupTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("group", function(Blueprint $table)
		{
		
			$this->setTable($table)
			->addPrimary()
			->addString("name")
			->addTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group', function(Blueprint $table)
		{
			//
			Schema::dropIfExists("group");
		});
	}

}
