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

        for ($i = 0; $i < 200; $i++) {
            Item::create([
                'name' => ucfirst($faker->word . ' ' . $faker->word),
                'shelf_id' => $faker->numberBetween(1, 50),
                'image_url' => 'https://picsum.photos/800/600?random=' . $i,
                'description' => ucfirst($faker->paragraph),
                'date' => $faker->dateTimeBetween('-1 year', 'now'),
                'count' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}

https://random.imagecdn.app/v1/image?width=800&height=600&category=food&format=png&provider=LoremFlickr