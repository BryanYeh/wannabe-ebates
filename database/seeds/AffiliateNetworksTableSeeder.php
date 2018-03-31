<?php

use Illuminate\Database\Seeder;

class AffiliateNetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $affiliates = array(
            array(
                'name'=> 'Commisson Junction', 
                'slug' => 'commisson-junction',
                'website' => 'http://www.cj.com/',
                'logo' => 'http://www.cj.com/sites/all/themes/cj_us/img/CJ_Affiliate_Logo.png',
                'status' => 1,
                'subid' => 'sid'
            ),
            array(
                'name'=> 'Linkshare', 
                'slug' => 'linkshare',
                'website' => 'https://rakutenmarketing.com/affiliate',
                'logo' => 'https://rakutenmarketing.com/wp-content/themes/marketing-rakuten/assets/images/rakuten-marketing-stacked.png',
                'status' => 1,
                'subid' => 'u1'
            ),
        );


        foreach ($affiliates as $affiliate) {
            App\AffiliateNetwork::create(
                $affiliate
            );  
        }
    }
}
