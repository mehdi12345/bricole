<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CashfreeSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('cashfree_settings')->insert(array (
            0 => 
            array (
                'id'          => 1,
                'is_enabled'  => 0,
                'name'        => 'Cashfree',
                'description' => 'Pay using Cashfree',
            ),
        ));
        
        
    }
}