<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shelf;
use App\Models\Warehouse;
use Faker\Factory as Faker;

class ShelfSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $warehouses = Warehouse::count();

        if ($warehouses === 0) {
            throw new \Exception('No warehouses found. Please run warehouse seeder first.');
        }

        for ($i = 0; $i < 200; $i++) {
            Shelf::create([
                'name' => ucfirst($faker->word . ' ' . $faker->word),
                'warehouse_id' => $faker->numberBetween(1, $warehouses),
            ]);
        }
    }
}