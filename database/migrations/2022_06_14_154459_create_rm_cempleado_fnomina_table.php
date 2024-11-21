<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmCempleadoFnominaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_cempleados_fnomina', function (Blueprint $table) {
            $table->string('Rfc', 13)->primary();
            $table->string('Curp', 18)->nullable();
            $table->string('Nombre', 50)->nullable();
            $table->string('Apellido_Paterno', 50)->nullable();
            $table->string('Apellido_Materno', 50)->nullable();
            $table->string('Cve_Puesto', 11);
            $table->string('Descripcion_P', 150)->nullable();
            $table->string('Num_Plaza', 15);
            $table->string('Cve_Unidad', 3);
            $table->string('Descripcion_U', 150)->nullable();
            $table->tinyInteger('Activo')->default(1);
            $table->integer('Id_Empleado');
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
        Schema::dropIfExists('rm_cempleados_fnomina');
    }
}
