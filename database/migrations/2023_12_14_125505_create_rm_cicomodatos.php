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
        Schema::create('rm_cicomodatos', function (Blueprint $table) {
            $table->integer('Id')->nullable();
            $table->string('Id_Res', 14)->primary();
            $table->string('Dirigido_A', 50)->nullable();
            $table->string('Puesto_A', 50)->nullable();
            $table->string('Est_Ent_Sal', 30)->nullable();
            $table->string('Estatus', 30)->nullable();
            $table->unsignedInteger('Id_To')->nullable();
            $table->foreign('Id_To')->references('Id_To')->on('rm_tipoopera');
            $table->double('Total', 15,2)->nullable();
            $table->timestamp('Fecha_Cap')->nullable();
            $table->text('Comentarios')->nullable();
            $table->unsignedBigInteger('Id_Usuario')->nullable();
            $table->foreign('Id_Usuario')->references('id')->on('users');
            $table->unsignedInteger('Ur')->nullable();
            $table->string('Ue',4)->nullable();
            $table->string('Id_Almacen_D', 4)->nullable();
            $table->foreign('Id_Almacen_D')->references('Almacen')->on('rm_almacenes');
            $table->string('Id_Almacen_O', 4)->nullable();
            $table->foreign('Id_Almacen_O')->references('Almacen')->on('rm_almacenes');
            $table->timestamp('Fecha_Apl')->nullable();
            $table->text('Motivo_Rechazo')->nullable();
            $table->text('Autorizaciones')->nullable();
            $table->timestamps();

            //Indices
            $table->index('Est_Ent_Sal');
            $table->index('Id_Almacen_D');
            $table->index('Id_Almacen_O');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rm_cicomodatos');
    }
};
