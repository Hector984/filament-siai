<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Eliminar procedimiento almacenado si existe
        DB::statement('DROP PROCEDURE IF EXISTS consulta_bitacora_movimientos');

        // Crear el procedimiento almacenado

        DB::unprepared("CREATE PROCEDURE consulta_bitacora_movimientos(
            IN idAlmacen VARCHAR(3),
            IN Ano int(4),
            IN Mes varchar(2),
            IN fechaInicio DATE ,
            IN fechaFin DATE ,
            IN tipoPeriodo VARCHAR(10)
            )
            BEGIN
                DECLARE vAno INT;
                DECLARE vMes VARCHAR(2);
                DECLARE vFechaInicio DATE;
                DECLARE vFechaFin DATE;

                -- Asignar valores predeterminados si los parámetros son NULL
                SET vAno = IFNULL(Ano, 0);
                SET vMes = IFNULL(Mes, '00');
                SET vFechaInicio = IFNULL(fechaInicio, '2024-01-01');
                SET vFechaFin = IFNULL(fechaFin, null);

            select bm.Id_Docto, bm.No_Inventario, bm.Tipo_Movimiento, bm.Fecha_Registro
            FROM tb_bitacora_movimientos_no_inventario bm
            JOIN (SELECT
                  No_Inventario,
                MAX(Fecha_Registro) AS Ultima_Fecha
                FROM
                tb_bitacora_movimientos_no_inventario
                GROUP BY
                No_Inventario
            ) AS um
            ON
            bm.No_Inventario = um.No_Inventario
            AND bm.Fecha_Registro = um.Ultima_Fecha
            WHERE
             (
                (tipoPeriodo = 'PERIODO' AND bm.Fecha_Registro BETWEEN vFechaInicio AND vFechaFin)
                OR (tipoPeriodo = 'MENSUAL' AND YEAR(bm.Fecha_Registro) = vAno AND MONTH(bm.Fecha_Registro)  = vMes)
                OR (tipoPeriodo = 'ANUAL' AND YEAR(bm.Fecha_Registro) = vAno)
            )
            AND (
            (bm.Tipo_Movimiento = 'ALTA' AND bm.Id_Almacen_O = idAlmacen)
            OR (bm.Tipo_Movimiento = 'ENTRADA' AND bm.Id_Almacen_D = idAlmacen)
            )
            AND (
            bm.Tipo_Movimiento != 'SALIDA'
            AND bm.Tipo_Movimiento != 'BAJA'
            OR (bm.Tipo_Movimiento = 'ENTRADA' AND bm.Id_Almacen_D = idAlmacen)
            )
            GROUP BY
            bm.Id_Docto,
            bm.No_Inventario,
            bm.Tipo_Movimiento
            order by bm.fecha_registro;
            END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_bitacora_movimientos');
    }
};
