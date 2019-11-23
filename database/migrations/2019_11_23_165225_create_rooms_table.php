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
			$table->string('name')
				->unique()
				->comment('Nome do quarto');
			$table->enum('type', ['SIMPLE', 'DOUBLE', 'APARTMENT', 'SUITE'])
				->comment('Tipo do quarto');
			$table->enum('status', ['ACTIVE', 'INACTIVE'])
				->comment('Status do quarto');
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('rooms');
	}
}
