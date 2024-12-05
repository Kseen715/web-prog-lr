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

        for ($i = 0; $i < 50; $i++) {
            Shelf::create([
                'name' => ucfirst($faker->word . ' ' . $faker->word),
                'warehouse_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}