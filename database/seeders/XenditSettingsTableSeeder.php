<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class XenditSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('xendit_settings')->insert(array (
            0 => 
            array (
                'id'            => 1,
                'is_enabled'    => 0,
                'name'          => 'Xendit',
                'currency'      => 'IDR',
                'exchange_rate' => 1,
            ),
        ));
    
    }
}