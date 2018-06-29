<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillerBanners extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,150) as $index) {
	        DB::table('banners')->insert([
                'uuid' => $faker->uuid,
                'image' => 'https://picsum.photos/300/250?image='.$faker->numberBetween($min = 0, $max = 1010),
                'link' => $faker->url,
                'title' => $faker->text(65),
                'start_date' => $faker->dateTimeBetween('now', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+2 years'),
                'width' => 300,
                'height' => 250,
                'retailer_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
