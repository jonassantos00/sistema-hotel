<?php

	use Illuminate\Database\Seeder;
	use App\User;


	class EmployeesTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			User::insert([
				['nome'   => 'Administrador', 'data_nascimento' => '2019-11-02', 'cpf' => '09912399865',
				 'cargo'  => 'Gerente', 'email' => 'administrador@sistema.hotel', 'password' => bcrypt('admin@2019!'),
				 'status' => 'Ativo'
				]
			]);
		}
	}
