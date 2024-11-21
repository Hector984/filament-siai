<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmCresguardosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_cresguardos', function (Blueprint $table) {
            $table->string('Rfc', 13)->primary();
            $table->string('Curp',18);
            $table->string('Nombre',50)->nullable();
            $table->string('Apellido_Paterno',50)->nullable();
            $table->string('Apellido_Materno',50)->nullable();
            $table->string('Cve_Puesto',10);
            $table->string('Descripcion_Puesto',100)->nullable();
            $table->string('Num_Plaza',15);
            $table->string('Cve_Unidad',3);
            $table->string('Descripcion_Unidad',100)->nullable();
            $table->smallInteger('Fuera_Nomina')->nullable();
            $table->string('Documento_Resguardo',50)->nullable();
            $table->string('Estatus')->default('F');
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
        Schema::dropIfExists('rm_cresguardos');
    }
}
