<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
	public function up()
	{
		Schema::create('clients', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 100)->comment('Nome do cliente');
			$table->string('email', 150)->unique()->comment('E-mail do cliente');
			$table->bigInteger('id_external')->unique()->comment('ID externo do cliente, utilizado para identificar o cliente no sistema legado');
			$table->string('phone', 25)->nullable()->comment('Telefone para contato do cliente');
			$table->string('address', 200)->nullable()->comment('Endereço do cliente');
			$table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
			$table->timestamps();
			$table->softDeletes();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('clients');
	}
}
