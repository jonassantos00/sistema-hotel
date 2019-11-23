<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
	public function up()
	{
		Schema::create('reservations', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('id_client')
				->comment('Identificador do cliente');
			$table->dateTimeTz('reservation_start_date')
				->comment('Data de inicio da reserva do cliente');
			$table->dateTimeTz('reservation_end_date')
				->comment('Data de término da reserva do cliente');
			$table->unsignedBigInteger('id_room')
				->comment('Identicador do quarto que o cliente reservou');
			$table->enum('status', ['RESERVED', 'CANCELED', 'EXPIRED'])
				->default('RESERVED')
				->comment('Status da reserva');
			$table->timestamps();
			$table->softDeletesTz();
			
			$table->foreign('id_client')->references('id')->on('clients');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('reservations');
	}
}
