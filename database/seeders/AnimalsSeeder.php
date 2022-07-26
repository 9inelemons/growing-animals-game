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
                'growth_factor' => 0.25
            ],
            [
                'kind' => 'dog',
                'max_size' => 50,
                'max_age' => 100,
                'growth_factor' => 0.5
            ],
            [
                'kind' => 'bird',
                'max_size' => 10,
                'max_age' => 50,
                'growth_factor' => 0.5
            ],
            [
                'kind' => 'british_cat',
                'max_size' => 20,
                'max_age' => 100,
                'growth_factor' => 0.2
            ],
        ];

        foreach ($animals as $animal)
        {
            Animal::create($animal);
        }
    }
}
