<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        \DB::table('positions')->insert([
            [
                'name' => 'Shape',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eyes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nose',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mouth',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
