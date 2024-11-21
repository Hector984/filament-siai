<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmCinstrumentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rm_cinstrumental', function (Blueprint $table) {
            $table->string('Id_Docto', 12)->primary();
            $table->string('Pedido', 30)->nullable();
            $table->string('Factura', 30)->nullable();
            $table->string('Proveedor', 40)->nullable();
            $table->timestamp('Fecha_Cap')->nullable();
            $table->timestamp('Fecha_Apl')->nullable();
            $table->timestamp('Fecha_Compro')->nullable();
            $table->timestamp('Fecha_Realen')->nullable();
            $table->unsignedInteger('Id_To')->nullable();
            $table->foreign('Id_To')->references('Id_To')->on('rm_tipoopera');
            $table->string('Estatus', 2)->nullable();
            $table->integer('Activacion')->nullable()->default(1);
            $table->double('Subtotal', 15, 2)->nullable();
            $table->double('Descuento', 15, 2)->nullable();
            $table->double('Total', 15, 2)->nullable();
            $table->string('Comentarios', 255)->nullable();
            $table->unsignedInteger('Ur')->nullable();
            $table->string('Ue',4)->nullable();
            // $table->unsignedInteger('Ue')->nullable();
            $table->string('Id_Almacen', 4)->nullable();
            $table->foreign('Id_Almacen')->references('Almacen')->on('rm_almacenes');
            $table->unsignedBigInteger('Id_Usuario')->nullable();
            $table->foreign('Id_Usuario')->references('id')->on('users');
            $table->string('Recibio', 40)->nullable();
            $table->string('Puesto_Rec', 45)->nullable();
            $table->string('Vobo', 50)->nullable();
            $table->string('Puesto_Vobo', 50)->nullable();
            $table->integer('Dias_Penal')->nullable();
            $table->timestamps();
            //Indices
            $table->index(['Id_Almacen']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rm_cinstrumental');
    }
}
