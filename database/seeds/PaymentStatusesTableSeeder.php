<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array(
            'pending' => 'pending',
            'approved' => 'approved',
            'declined' => 'declined',
            'confirmed' => 'confirmed'
        );


        foreach ($statuses as $name => $slug) {
            App\PaymentStatus::create([
                'name' => $name,
                'slug' => $slug
            ]);  
        }
    }
}
