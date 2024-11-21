<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rm_ccomodatos', function (Blueprint $table) {
            $table->string('Id_Docto', 12)->primary();
            $table->timestamp('Fecha_Cap')->nullable();
            $table->timestamp('Fecha_Apl')->nullable();
            $table->string('Estatus', 2)->nullable();
            $table->integer('Activacion')->nullable()->default(1);
            $table->double('Total', 15, 2)->nullable();
            $table->text('Comentarios', 255)->nullable();
            $table->unsignedInteger('Ur')->nullable();
            $table->string('Ue',4)->nullable();
            $table->string('Id_Almacen', 4)->nullable();
            $table->foreign('Id_Almacen')->references('Almacen')->on('rm_almacenes');
            $table->unsignedBigInteger('Id_Usuario')->nullable();
            $table->foreign('Id_Usuario')->references('id')->on('users');
            $table->string('Recibio', 40)->nullable();
            $table->string('Puesto_Rec', 45)->nullable();
            $table->string('Vobo', 50)->nullable();
            $table->string('Puesto_Vobo', 50)->nullable();
            $table->string('Num_Contrato', 40)->nullable();
            $table->timestamp('Fecha_Vigencia')->nullable();
            $table->text('Procedencia')->nullable();
            $table->timestamp('Fecha_Termino')->nullable();
            $table->timestamps();
            //Indices
            $table->index('Id_Almacen');
            $table->index('Estatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rm_ccomodatos');
    }
};
