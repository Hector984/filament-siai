<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SsUnidadResponsSeeder::class,
            SsUnidadEjecutSeeder::class,
            DependenciaSeeder::class,
            RmAlmacenSeeder::class,
            RmInmuebleSeeder::class,
            RmNivelSeeder::class,
            RmMarcaSeeder::class,
            RmTipooperaSeeder::class,
            RmCuentaMayorSeeder::class,
            RmSeccionSeeder::class,
            RmUnidadDeMedidaSeeder::class,
            RmSubGrupoSeeder::class,
            RmClaseSeeder::class,
            RmCabmsSeeder::class,
            UsuarioSeeder::class
        ]);
    }
}
