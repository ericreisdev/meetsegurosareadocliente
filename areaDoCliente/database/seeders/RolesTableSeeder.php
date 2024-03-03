<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Adiciona os roles
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'client'],
        ]);

        // Associa os usuários aos roles
        DB::table('role_user')->insert([
            ['user_id' => 1, 'role_id' => DB::table('roles')->where('name', 'admin')->first()->id],
            ['user_id' => 2, 'role_id' => DB::table('roles')->where('name', 'client')->first()->id],
        ]);
    }
}


// C:\laragon\www\public_html\areaDoCliente\database\seeders\RolesTableSeeder.php