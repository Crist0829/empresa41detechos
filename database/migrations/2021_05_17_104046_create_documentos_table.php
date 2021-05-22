<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->date('vence');
            $table->float('monto');
            $table->date('fecha_actual');
            $table->string('pagare');
            $table->string('forma_pagos');
            $table->string('nombre_cliente');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('ordent_id');
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
        Schema::dropIfExists('documentos');
    }
}
