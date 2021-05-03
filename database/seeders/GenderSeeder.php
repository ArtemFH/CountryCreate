<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    public function run()
    {
        $genders = [
            [
                'id' => '10',
                'name' => 'Man',
            ], [
                'id' => '20',
                'name' => 'Woman',
            ], [
                'id' => '30',
                'name' => 'Furry',
            ]
        ];
        DB::table('genders')->insert($genders);
    }
}
