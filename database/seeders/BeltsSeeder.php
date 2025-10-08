<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BeltsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $belts = [
            ['name' => 'White'],
            ['name' => 'Yellow'],
            ['name' => 'Yellow-Green'],
            ['name' => 'Green'],
            ['name' => 'Green-Blue'],
            ['name' => 'Blue'],
            ['name' => 'Blue-Red'],
            ['name' => 'Red'],
            ['name' => 'Red-Black'],
            ['name' => 'Orange'],
            ['name' => 'Purple'],
            ['name' => 'Brown'],
            ['name' => 'Associate'],
            ['name' => 'Black']
        ];

        DB::table('belts')->insert($belts);
    }
}
