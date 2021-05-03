<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {

        $admin = [
            [
                'username' => 'admin',
                'password' => '$2y$10$cfqtvwLxvfi3nhK4BTGtE.eebl12CXGwe38WP8vWxDZ9dkbu2mRxe',
                'role_id' => 30,
                'gender_id' => 10,
                'age' => 18
            ]
        ];
        DB::table('users')->insert($admin);
    }
}
