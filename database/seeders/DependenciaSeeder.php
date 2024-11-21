<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_cat_dependencias')->insert([
            'ln_dependencia' => 'DGRMIS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
