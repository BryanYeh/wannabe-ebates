<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillerCategoryRetailer extends Seeder
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
	        DB::table('category_retailer')->insert([
                'category_id' => $faker->numberBetween(1,10),
                'retailer_id' => $index
            ]);
        }
    }
}
