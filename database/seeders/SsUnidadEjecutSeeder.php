<?php

namespace Database\Seeders;

use App\Models\Catalogos\SsUnidadEjecut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class SsUnidadEjecutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados no se lean y quitarlos de la iteracion
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/rm_ejecuts.csv', 'r')
            ->setHeaderOffset(0)->setDelimiter(',');

        //Se compara si el archivo tiene el formato correcto de CSV para convertirlo a UTF-8 si es que no lo es
        $input_bom = $csv->getInputBOM();
        if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
            $csv->appendStreamFilter('convert.iconv.UTF-16/UTF-8');
        }
        $records = $csv->getRecords();

        foreach ($records as $r) {
            SsUnidadEjecut::create([
                'Ue' => $r['Ue'],
                'Ur' => $r['Ur'],
                'Clave' => str_pad($r['Clave'], 2, '0', STR_PAD_LEFT),
                'Descripcion' => $r['Descripcion']
            ]);
        }
    }
}
