<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shelf;
use Faker\Factory as Faker;

class ShelfSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Shelf::create([
                'name' => ucfirst($faker->word . ' ' . $faker->word),
            ]);
        }
    }
}