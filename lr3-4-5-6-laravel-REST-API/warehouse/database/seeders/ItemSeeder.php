<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Shelf; 
use Faker\Factory as Faker;

const IMAGE_URLS = [
    'https://avatars.mds.yandex.net/i?id=63edd0ec4bfc5fe5beeb6fbbefac7680629c5342-5888810-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=9766518a5a08c8db9680311142371c1405401476-6392895-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=93289a2a2601f32dc0e8283517af769943443ee5-8985546-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=4ec7b789ad7fd937ee2c7598ba92767de640207d-8497272-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=7dd4a764ae81f0e373192a61e6fc0242e11dbf7d-10555242-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=55cb818c376e9045e2ead59f0e6b3337c07f7ac6-13480663-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=8d3126718999558df55a081f6fcbfef860cb2ff0-8790138-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=0c3b355b184ccd1ab32622c440b4a0962554deec-5430057-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=0b1fee7f268c2c143cae1a3cb3343af2a5f8d920-8750458-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=74f2a60c87563514b95427c2a81e6ec4e136ba0bf6bc3b23-12774514-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=856da2ff02736e36394bd1d2951f571a1051bbf1-7265716-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=477a5749fdaa656ba0c1450f3c4101cd9b1f4ff3-7937305-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=246c4b0d8e66fc0050ef8a3195165467ffae915a-5326992-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=71c7657e97922334d61027a6a8277e31bd730d96-8339189-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=2f79d658bdebb94b7330725e8433483dd323a3a1-12346171-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=2a0000017a0f20b0baaa7163d605eb4b4612-3709311-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=163ea5909e9cfffaa1400487f74cad8245bd8670-11491093-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=eb116bb99e222f52547b7c364e7e8b8d182f0f01-5888781-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=d6da87c503a45342579429a57c8caaa61b332545-9152778-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=336ee330dbc17eb340953e74b7b7123a920ba3aa-4607687-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=bcf36f9c8681a8387e41992f188186743ecf4158-12518569-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=5626f3e4c22c23489939adbaed4279b9cceb7b22-5237892-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=847b004df03f0e6840a9cb1f18f6c46fcba42c3c-4076159-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=f200e2b9148047dedeff446750304d7ed3753060-12422990-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=194f1ee92ca4225af93c233a5adb86c65fc44500-5672852-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=c4506efb884d0ba3b60ecc3a8270aa1853cdfd18-5667442-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=0cdb97e9fe5508db3d7ec3eca3aaad6d88373204-10371233-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=6455b2a8900ee590a25f6c448b0061818f534002-12738621-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=3ac4a03bcd23a499841772cbc61ded407d2da984-13279719-images-thumbs&n=13',
    'https://avatars.mds.yandex.net/i?id=3530af76d741ed716a983e8bbef4ad7172233fac-8494072-images-thumbs&n=13',
];

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Get total number of shelves from database
        $shelfCount = Shelf::count();

        // Ensure we have at least one shelf
        if ($shelfCount === 0) {
            throw new \Exception('No shelves found. Please run shelf seeder first.');
        }

        // get the number of shelves

        for ($i = 0; $i < 1000; $i++) {
            Item::create([
                'name' => ucfirst($faker->word . ' ' . $faker->word),
                'shelf_id' => $faker->numberBetween(1, $shelfCount),
                'image_url' => IMAGE_URLS[$faker->numberBetween(0,count(IMAGE_URLS)-1)],
                'description' => ucfirst($faker->paragraph),
                'date' => $faker->dateTimeBetween('-5 year', 'now'),
                'count' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}