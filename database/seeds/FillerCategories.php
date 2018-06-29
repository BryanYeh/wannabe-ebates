<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillerCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Beauty','Electronics','Clothes','Pets','Automotive','Flowers','Sports','Food','Office','Travel');
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('categories')->insert([
                'name' => $categories[$index-1],
                'parent' => 0,
                'title' => $categories[$index-1],
                'slug' => $faker->slug,
                'description' => $faker->paragraph(1),
                'meta_description' => $faker->paragraph(1),
                'meta_keywords' => $faker->paragraph(1),
                'status' => $faker->boolean,
                'position' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
