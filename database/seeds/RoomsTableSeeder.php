<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
	public function run()
	{
		factory(Room::class, 32)->create();
	}
}
