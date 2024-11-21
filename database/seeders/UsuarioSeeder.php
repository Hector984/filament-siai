<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::create([
            'id' =>3,
            'name' => 'Super Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'login' => 's.admin',
            'idur' => 59,
            'idue' => 241,
            'estatus' => 1,
            'cve_almacen' => '001',
        ]);
    }
}
