<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id' => '10',
                'name' => 'User'
            ], [
                'id' => '20',
                'name' => 'Vip'
            ], [
                'id' => '30',
                'name' => 'Admin'
            ]
        ];
        DB::table('roles')->insert($roles);
    }
}
