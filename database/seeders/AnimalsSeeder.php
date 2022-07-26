<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals = [
            [
                'kind' => 'cat',
                'max_size' => 25,
                'max_age' => 100,
                'growth_factor' => 1.0
            ],
            [
                'kind' => 'dog',
                'max_size' => 50,
                'max_age' => 120,
                'growth_factor' => 1.5
            ],
            [
                'kind' => 'bird',
                'max_size' => 10,
                'max_age' => 60,
                'growth_factor' => 0.6
            ],
            [
                'kind' => 'british_cat',
                'max_size' => 20,
                'max_age' => 90,
                'growth_factor' => 0.8
            ],
        ];

        foreach ($animals as $animal)
        {
            Animal::create($animal);
        }
    }
}
