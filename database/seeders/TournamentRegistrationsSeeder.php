<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TournamentRegistrationsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $registrations = [];

        for ($i = 0; $i < 200; $i++) {
            $age = $faker->numberBetween(6, 45);
            $gender = $faker->randomElement(['male', 'female']);

            // Height in inches depending on age/gender
            if ($age < 13) { // child
                $heightInches = $faker->numberBetween(45, 60); // 3'9"–5'0"
                $bmi = $faker->randomFloat(1, 15, 21);        // kids: wider BMI range
            } elseif ($age < 18) { // teen
                $heightInches = $faker->numberBetween(60, 70); // 5'0"–5'10"
                $bmi = $faker->randomFloat(1, 17, 24);         // leaner teens
            } else { // adult
                if ($gender === 'male') {
                    $heightInches = $faker->numberBetween(65, 76); // 5'5"–6'4"
                } else {
                    $heightInches = $faker->numberBetween(60, 70); // 5'0"–5'10"
                }
                $bmi = $faker->randomFloat(1, 18, 28); // adults, normal to slightly high
            }

            // Weight calculation from BMI
            $weightLbs = ($bmi * ($heightInches ** 2)) / 703;

            $registrations[] = [
                'name' => $faker->name($gender),
                'age' => $age,
                'gender' => $gender,
                'weight' => round($weightLbs, 2),
                'height' => round($heightInches, 2),
                'belt_rank' => $faker->randomElement([
                    'White',
                    'Yellow',
                    'Orange',
                    'Green',
                    'Blue',
                    'Purple',
                    'Brown',
                    'Black'
                ]),
                'school_name' => $faker->company . " Academy",
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tournament_registrations')->insert($registrations);
    }
}
