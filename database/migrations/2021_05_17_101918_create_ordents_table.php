<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordents', function (Blueprint $table) {
            $table->id();
            $table->string('turno_trabajo');
            $table->string('observaciones');
            $table->string('forma_pago');
            $table->string('su_entrega');
            $table->string('saldo_fuerza_mayor');
            $table->string('parte_contado');
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
        Schema::dropIfExists('ordents');
    }
}
