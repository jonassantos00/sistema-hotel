<?php

	/** @var \Illuminate\Database\Eloquent\Factory $factory */

	use App\Models\Employee;
	use Faker\Generator as Faker;

	$factory->define(Employee::class, function (Faker $faker) {
		return [
			'name'           => $faker->name, 'email' => $faker->unique()->safeEmail, 'email_verified_at' => now(),
			'remember_token' => Str::random(10), 'dt_birth' => now()->format('1995-10-21'), 'cpf' => Str::random(11),
			'office'         => Employee::EMPLOYEE, 'status' => Employee::ACTIVE, 'password' => bcrypt('P@ssw0rd')
		];
	});
