<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillerCoupons extends Seeder
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
	        DB::table('coupons')->insert([
                'uuid' => $faker->uuid,
                'title' => $faker->text(65),
                'sale_image' => 'https://picsum.photos/400/200?image='.$faker->numberBetween($min = 0, $max = 1010),
                'code' => $faker->boolean ? $faker->word : '',
                'link' => $faker->url,
                'description' => $faker->text(200),
                'start_date' => $faker->dateTimeBetween('now', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+2 years'),
                'coupon_type_id' => 1,
                'retailer_id' => $faker->numberBetween(1,10),
                'exclusive' => $faker->boolean,
                'status' => $faker->boolean
            ]);
        }
    }
}
