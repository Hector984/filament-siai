<?php

namespace Database\Seeders;

use App\Models\RmAlmacen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RmAlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados de la iteracion
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/rm_almacenes.csv', 'r')
            ->setHeaderOffset(0)->setDelimiter(',');

        //Se compara si el archivo tiene el formato correcto de CSV para convertirlo a UTF-8
        $input_bom = $csv->getInputBOM();
        if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
            $csv->appendStreamFilter('convert.iconv.UTF-16/UTF-8');
        }
        $records = $csv->getRecords();

        foreach ($records as $r) {
            $registro = new RmAlmacen();
            $registro->Almacen = str_pad($r['Almacen'],3,"0",STR_PAD_LEFT);
            $registro->Cuenta = $r['Cuenta'];
            $registro->Descripcion = $r['Descripcion'];
            $registro->Almacenista = $r['Almacenista'];
            $registro->Puesto_Alm = $r['Puesto_Alm'];
            $registro->Direccion = $r['Direccion'];
            $registro->Telefono = $r['Telefono'];
            $registro->Email = $r['Email'];
            $registro->Responsable_C = $r['Responsable_C'];
            $registro->Puesto_Resp_C = $r['Puesto_Resp_C'];
            $registro->Responsable_I = $r['Responsable_I'];
            $registro->Puesto_Resp_I = $r['Puesto_Resp_I'];
            $registro->Ur = $r['Ur'];
            $registro->Ue = $r['Ue'];
            $registro->Dependencia = $r['Dependencia'];
            $registro->Accesoif = $r['Accesoif'];

            $registro->save();
        }
    }
}
