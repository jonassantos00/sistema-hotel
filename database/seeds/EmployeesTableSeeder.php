<?php

	use Illuminate\Database\Seeder;
	use App\Models\Employee;

	class EmployeesTableSeeder extends Seeder
	{
		public function run()
		{
			factory(Employee::class, 25)->create();

			Employee::insert([
				[
					'name'   => 'Administrador',
					'dt_birth' => '2019-11-02',
					'cpf' => '09912399865',
				 	'office'  => Employee::MANAGER,
					'email' => 'administrador@sistema.hotel',
					'password' => bcrypt('admin@2019!'),
				 	'status' => Employee::ACTIVE
				]
			]);
		}
	}
