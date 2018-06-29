<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaymentStatusesTableSeeder::class,
            CouponTypesTableSeeder::class,
            AffiliateNetworksTableSeeder::class,
        ]);
        if(env('APP_ENV') == 'local'){
                $this->call([
                    FillerRetailers::class,
                    FillerBanners::class,
                    FillerCashbacks::class,
                    FillerCategories::class,
                    FillerCategoryRetailer::class,
                    FillerCoupons::class
                ]);
            }
    }
}
