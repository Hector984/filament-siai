<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVistaNominaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vista_nomina', function (Blueprint $table) {
            $table->id();
            $table->string('Rfc',13);
            $table->string('Curp',18);
            $table->string('Nombre',50)->nullable();
            $table->string('Apellido_Paterno',50)->nullable();
            $table->string('Apellido_Materno',50)->nullable();
            $table->string('Cve_Puesto',10);
            $table->string('Descripcion_Puesto',100)->nullable();
            $table->string('Num_Plaza',15);
            $table->string('Cve_Unidad',3);
            $table->string('Descripcion_Unidad',100)->nullable();
            $table->smallInteger('Estatus');
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
        Schema::dropIfExists('vista_nomina');
    }
}
