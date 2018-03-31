<?php

use Illuminate\Database\Seeder;

class CouponTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array(
            'Coupon Code' => 'coupon-code',
            'Printable Coupon' => 'printable-coupon',
            'Sale' => 'sale'
        );


        foreach ($statuses as $name => $slug) {
            App\CouponType::create([
                'name' => $name,
                'slug' => $slug
            ]);  
        }
    }
}
