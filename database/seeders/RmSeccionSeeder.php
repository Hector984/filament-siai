<?php

namespace Database\Seeders;

use App\Models\Catalogos\RmSeccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RmSeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados no se lean y quitarlos de la iteracion
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/rm_secciones.csv', 'r')
            ->setHeaderOffset(0)->setDelimiter(',');

        //Se compara si el archivo tiene el formato correcto de CSV para convertirlo a UTF-8 si es que no lo es
        $input_bom = $csv->getInputBOM();

        if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
            $csv->appendStreamFilter('convert.iconv.UTF-16/UTF-8');
        }

        $records = $csv->getRecords();
        $data = [];

        foreach ($records as $r) {
            $data[] = [
                'Id_Seccion' => $r['Id'],
                'Seccion' => $r['Seccion'],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];
        }

        $chunks = array_chunk($data, 500);

        foreach($chunks as $chunk)
        {
            RmSeccion::insert($chunk);
        }
    }
}
