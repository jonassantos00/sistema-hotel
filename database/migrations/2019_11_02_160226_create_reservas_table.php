<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_cliente')->references('id')->on('clientes')->onDelete('restrict');
            $table->bigInteger('id_quarto')->references('id')->on('quartos')->onDelete('restrict');
            $table->decimal('valor', 8,2);
            $table->enum('status', ['Aguardando Confirmação', 'Confirmada', 'Cancelada']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
