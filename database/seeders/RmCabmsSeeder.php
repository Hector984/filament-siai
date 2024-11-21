<?php

namespace Database\Seeders;

use App\Models\Catalogos\RmCabms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RmCabmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados no se lean y quitarlos de la iteracion
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/rm_cabms.csv', 'r')
            ->setHeaderOffset(0)->setDelimiter(',');

        // $csv = Reader::createFromPath('database/seeders/ArchivosCSV/nuevas_claves_cabms.csv', 'r')
        //     ->setHeaderOffset(0)->setDelimiter(',');

        //Se compara si el archivo tiene el formato correcto de CSV para convertirlo a UTF-8 si es que no lo es
        $input_bom = $csv->getInputBOM();
        if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
            $csv->appendStreamFilter('convert.iconv.UTF-16/UTF-8');
        }
        $records = $csv->getRecords();
        $data = [];

        foreach ($records as $r) {

            $data[] = [
                'IdCabms' => $r['IdCabms'],
                'Descripcion' => $r['Descripcion'],
                'Nivel' => $r['IdNivel'],
                'Partida1' => empty($r['Partida1']) ? null : $r['Partida1'],
                'Partida2' => empty($r['Partida2']) ? null : $r['Partida2'],
                'Estatus' => empty($r['Estatus']) ? null : $r['Estatus'],
                'Ccop' => empty($r['Ccop']) ? null : $r['Ccop'],
                'Pcontable' => $r['Pcontable'],
                'Descpartida' => $r['Descpartida'],
                'Historico_Clave_Cabm' => $r['Historico_Clave_Cabm'],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];

        }

        $chunks = array_chunk($data, 2000);
        
        foreach($chunks as $chunk)
        {
            RmCabms::insert($chunk);
        }
    }
}
