<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialrs', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto');
            $table->string('nombre');
            $table->integer('cantidad');
            $table->string('precio_venta');
            $table->string('precio_costo');
            $table->string('real_id');
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
        Schema::dropIfExists('materialrs');
    }
}
