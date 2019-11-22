<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateEmployeesTable extends Migration
	{
		public function up()
		{
			Schema::create('employees', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name', 100);
				$table->date('dt_birth');
				$table->string('cpf', 11)->unique();
				$table->enum('office', ['MANAGER', 'EMPLOYEE']);
				$table->string('email')->unique();
				$table->timestamp('email_verified_at')->nullable();
				$table->string('password');
				$table->rememberToken();
				$table->enum('status', ['ACTIVE', 'OFF', 'AWAY']);
				$table->timestamps();
			});
		}

		public function down()
		{
			Schema::dropIfExists('employees');
		}
	}
