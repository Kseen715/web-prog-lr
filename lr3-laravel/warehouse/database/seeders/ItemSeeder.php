<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Item::create([
                'name' => $faker->word . ' ' . $faker->word,
                'image_url' => 'https://picsum.photos/200/300?random=' . $i,
                'description' => $faker->paragraph,
                'date' => $faker->dateTimeBetween('-1 month', 'now'),
                'count' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}