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
			$table->string('name',60)
				->unique()
				->comment('Nome do quarto');
			$table->enum('type', ['SIMPLE', 'DOUBLE', 'APARTMENT', 'SUITE'])
				->comment('Tipo do quarto');
			$table->enum('status', ['ACTIVE', 'INACTIVE', 'RESERVED'])
				->default('ACTIVE')
				->comment('Status do quarto');
			$table->float('daily_value')
				->comment('Valor da diária');
			$table->smallInteger('number')
				->comment('Número do quarto');
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('rooms');
	}
}
