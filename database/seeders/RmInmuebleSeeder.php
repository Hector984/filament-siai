<?php

namespace Database\Seeders;

use App\Models\Catalogos\RmInmueble;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RmInmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados no se lean y quitarlos de la iteracion
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/inmuebles.csv', 'r')
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
                'IdInmueble' => $r['Id'],
                'Id_Almacen' => empty($r["Id_Almacen"]) ? null : str_pad($r["Id_Almacen"], 3, "0", STR_PAD_LEFT),
                'Inmueble' => $r['Inmueble'],
                'ind_central' => $r['Ind_Central'],
                'Telefono' => $r['Telefono'],
                'ln_nombre_primer_responsable' => $r['ln_nombre_primer_responsable'],
                'ln_nombre_segundo_responsable' => $r['ln_nombre_segundo_responsable'],
                'Direccion' => $r['Direccion'],
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()


            ];
        }

        $chunks = array_chunk($data, 300);
        
        foreach($chunks as $chunk)
        {
            RmInmueble::insert($chunk);
        }
    }
}
