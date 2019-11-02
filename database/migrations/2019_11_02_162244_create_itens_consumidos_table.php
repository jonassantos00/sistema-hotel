<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensConsumidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_consumidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_reserva')->refernces('id')->on('reservas')->onDelete('cascade');
            $table->string('item', 100);
            $table->decimal('valor', 8,2);
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
        Schema::dropIfExists('itens_consumidos');
    }
}
