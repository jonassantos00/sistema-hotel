<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
	public function up()
	{
		Schema::create('rooms', function (Blueprint $table) {
			$table->bigIncrements('id');
<<<<<<< HEAD
			$table->string('name',60)
=======
			$table->string('name')
>>>>>>> f32ed883c13c98fe78ca454d36eb073f4c9cae44
				->unique()
				->comment('Nome do quarto');
			$table->enum('type', ['SIMPLE', 'DOUBLE', 'APARTMENT', 'SUITE'])
				->comment('Tipo do quarto');
<<<<<<< HEAD
			$table->enum('status', ['ACTIVE', 'INACTIVE', 'RESERVED'])
				->default('ACTIVE')
				->comment('Status do quarto');
			$table->float('daily_value')
				->comment('Valor da diária');
			$table->smallInteger('number')
				->comment('Número do quarto');
=======
			$table->enum('status', ['ACTIVE', 'INACTIVE'])
				->comment('Status do quarto');
>>>>>>> f32ed883c13c98fe78ca454d36eb073f4c9cae44
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('rooms');
	}
}
