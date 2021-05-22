<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_orden');
            $table->string('horario_visita');
            $table->string('tipo_trabajo');
            $table->string('techo_de');
            $table->string('alto');
            $table->string('escalera');
            $table->string('contacto');
            $table->string('observaciones');
            $table->string('superficie_total');
            $table->string('metros_cuadrados');
            $table->string('croquis_ubicacion');
            $table->string('croquis_techo');
            $table->string('trabajo_id');
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
        Schema::dropIfExists('ordens');
    }
}
