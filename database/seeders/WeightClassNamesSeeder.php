<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightClassNamesSeeder extends Seeder
{
    public function run()
    {
        $names = [
            'Rooster',
            'Light Feather',
            'Feather',
            'Light',
            'Middle',
            'Medium Heavy',
            'Heavy',
            'Super Heavy',
            'Ultra Heavy',
            'Open Class',
            // Kids (example groupings)
            'Pee-Wee 1',
            'Pee-Wee 2',
            'Pee-Wee 3',
        ];

        foreach ($names as $name) {
            DB::table('weight_class_names')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
