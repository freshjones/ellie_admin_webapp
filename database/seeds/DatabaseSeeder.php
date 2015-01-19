<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('PlansTableSeeder');
	}

}

class PlansTableSeeder extends Seeder {

	public function run()
	{
		DB::table('plans')->delete();

		$plans = array();

		$plans[] = ['name' => 'sandbox', 'cost' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime];
		$plans[] = ['name' => 'bronze', 'cost' => 450, 'created_at' => new DateTime, 'updated_at' => new DateTime];
		$plans[] = ['name' => 'gold', 'cost' => 650, 'created_at' => new DateTime, 'updated_at' => new DateTime];
		$plans[] = ['name' => 'platinum', 'cost' => 650, 'created_at' => new DateTime, 'updated_at' => new DateTime];

		DB::table('plans')->insert($plans);

	}

}
