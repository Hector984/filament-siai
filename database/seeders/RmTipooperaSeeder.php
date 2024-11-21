<?php

namespace Database\Seeders;

use App\Models\Catalogos\TipoOperacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class RmTipooperaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se establece el HeaderOffset para que los encabezados no se lean y quitarlos de la iteracion
        $csv = Reader::createFromPath('database/seeders/ArchivosCSV/tipo_operaciones.csv', 'r')
            ->setHeaderOffset(0)->setDelimiter(',');

        //Se compara si el archivo tiene el formato correcto de CSV para convertirlo a UTF-8 si es que no lo es
        $input_bom = $csv->getInputBOM();
        if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
            $csv->appendStreamFilter('convert.iconv.UTF-16/UTF-8');
        }
        
        $records = $csv->getRecords();

        foreach ($records as $r) {
            $registro = new TipoOperacion();
            $registro->Id_To = $r['Id_To'];
            $registro->Documento = $r['Documento'];
            $registro->Descripcion = $r['Descripcion'];
            $registro->Movimiento = $r['Movimiento'];

            $registro->save();
        }
    }
}
