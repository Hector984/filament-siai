<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsunidadResponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssunidad_respons', function (Blueprint $table) {
            $table->increments('Ur');
            $table->string('Clave', 50)->nullable();
            $table->string('Descripcion', 100)->nullable();
            $table->string('ln_responsable', 120)->nullable();
            $table->char('sn_activacion')->nullable();
            $table->date('dt_inicio_inventario')->nullable();
            $table->date('dt_fin_inventario')->nullable();
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
        Schema::dropIfExists('ssunidad_respons');
    }
}
