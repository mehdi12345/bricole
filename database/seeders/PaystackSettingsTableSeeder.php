<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaystackSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('paystack_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'is_enabled'    => 0,
                'name'          => 'Paystack',
                'description'   => 'Pay usin Paystack',
                'exchange_rate' => '1',
            ),
        ));
        
        
    }
}