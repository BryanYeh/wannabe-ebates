<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillerRetailers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('retailers')->insert([
                'name' => $faker->company,
                'website' => $faker->url,
                'logo' => 'https://picsum.photos/150/50?image='.$faker->numberBetween($min = 0, $max = 1010),
                'tracking_link' => $faker->url,
                'program_id' => $faker->numberBetween(),
                'description' => $faker->paragraph(1),
                'conditions' => $faker->paragraph(1),
                'tags' => $faker->paragraph(1),
                'seo_title' => $faker->company,
                'meta_description' => $faker->paragraph(1),
                'meta_keywords' => $faker->paragraph(1),
                'slug' => $faker->slug,
                'start_date' => $faker->dateTime(),
                'end_date' => $faker->dateTimeBetween('now', '+2 years'),
                'status' => $faker->boolean,
                'affiliate_network_id' => 1,
                'store_of_week' => $faker->boolean,
                'featured_store' => $faker->boolean
            ]);
        }
    }
}
