<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->company,
		'type' => $faker->randomElement([Room::SIMPLE, Room::DOUBLE, Room::APARTMENT, Room::SUITE]),
		'status' => Room::ACTIVE,
		'daily_value' => $faker->randomFloat(null,80,800),
		'number' => $faker->unique()->numberBetween(1, 32)
	];
});
