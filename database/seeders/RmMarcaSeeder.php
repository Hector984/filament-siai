<?php

namespace Database\Seeders;

use App\Models\Catalogos\RmMarca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RmMarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados no se lean y quitarlos de la iteracion
        // catalogo_marcas_version_nueva
        //tb_marcas_v3
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/rm_marcas.csv', 'r')
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
                'marca_id' => $r['marca_id'],
                'marca_descripcion' => $r['marca_descripcion'],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];
        }

        $chunks = array_chunk($data, 2000);

        foreach($chunks as $chunk)
        {
            RmMarca::insert($chunk);
        }
    }
}
