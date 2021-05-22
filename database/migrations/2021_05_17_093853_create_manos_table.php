<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_trabajo');
            $table->string('precio_metro_cuadrado');
            $table->string('fecha_mano');
            $table->string('cotizacion_id');
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
        Schema::dropIfExists('manos');
    }
}
