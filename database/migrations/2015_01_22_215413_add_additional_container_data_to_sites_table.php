<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalContainerDataToSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		/*
		 * site.host.ip=192.168.10.10
		 * site.container.data=null
		 * site.container.id=null
		 * site.container.ip=null
		 * site.container.image=null
		 * site.container.port=null
		 */
		//
		Schema::table('sites', function($table)
		{
			$table->string('host_ip');
			$table->string('container_id');
			$table->string('container_ip');
			$table->string('container_image');
			$table->string('container_port');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::table('sites', function($table)
		{
			$table->dropColumn('host_ip');
			$table->dropColumn('container_id');
			$table->dropColumn('container_ip');
			$table->dropColumn('container_image');
			$table->dropColumn('container_port');
		});
	}

}
