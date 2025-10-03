<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightClassesSeeder extends Seeder
{
    public function run()
    {
        // Get name IDs from weight_class_names
        $nameIds = DB::table('weight_class_names')->pluck('id', 'name');

        $classes = [
            // Adult Male
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Rooster',       'max_weight' => 127],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Light Feather', 'max_weight' => 141],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Feather',       'max_weight' => 154],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Light',         'max_weight' => 168],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Middle',        'max_weight' => 181],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Medium Heavy',  'max_weight' => 195],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Heavy',         'max_weight' => 208],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Super Heavy',   'max_weight' => 222],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Ultra Heavy',   'max_weight' => null],
            ['division' => 'adult', 'gender' => 'male',   'class_name' => 'Open Class',    'max_weight' => null],

            // Adult Female
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Rooster',       'max_weight' => 107],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Light Feather', 'max_weight' => 118],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Feather',       'max_weight' => 129],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Light',         'max_weight' => 141],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Middle',        'max_weight' => 152],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Medium Heavy',  'max_weight' => 163],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Heavy',         'max_weight' => 175],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Super Heavy',   'max_weight' => null],
            ['division' => 'adult', 'gender' => 'female', 'class_name' => 'Open Class',    'max_weight' => null],

            // Kids (examples, can expand full chart)
            ['division' => 'kid', 'gender' => 'male',   'class_name' => 'Pee-Wee 1', 'max_weight' => 53],
            ['division' => 'kid', 'gender' => 'male',   'class_name' => 'Pee-Wee 2', 'max_weight' => 62],
            ['division' => 'kid', 'gender' => 'male',   'class_name' => 'Pee-Wee 3', 'max_weight' => 71],
            ['division' => 'kid', 'gender' => 'female', 'class_name' => 'Pee-Wee 1', 'max_weight' => 53],
            ['division' => 'kid', 'gender' => 'female', 'class_name' => 'Pee-Wee 2', 'max_weight' => 62],
            ['division' => 'kid', 'gender' => 'female', 'class_name' => 'Pee-Wee 3', 'max_weight' => 71],
        ];

        foreach ($classes as $class) {
            DB::table('weight_classes')->insert([
                'division' => $class['division'],
                'gender' => $class['gender'],
                'class_name_id' => $nameIds[$class['class_name']],
                'max_weight' => $class['max_weight'],
                'unit' => 'lbs',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
