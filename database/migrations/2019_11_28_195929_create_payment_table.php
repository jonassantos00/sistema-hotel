<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
	
	public function up()
	{
		Schema::create('payments', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('id_reservation')->unsigned()->comment('ID da reserva');
			$table->float('paid_value')->comment('Valor pago na reserva  (valor diária * dias)');
			$table->boolean('is_paid')->default(false)->comment('Informa se foi realizado o pagamento');
			$table->timestampsTz();
			$table->softDeletesTz();
			
			$table->foreign('id_reservation')->references('id')->on('reservations');
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('payments');
	}
}
