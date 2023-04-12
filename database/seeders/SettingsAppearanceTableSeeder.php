<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsAppearanceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::table('settings_appearance')->insert(array (
            0 => 
            array (
                'id'                       => 1,
                'home_image_id'            => NULL,
                'badge_short_text'         => 'New',
                'badge_long_text'          => 'Put your badge long text here',
                'badge_link'               => '#',
                'primary_link_text'        => 'Join us',
                'primary_link_target'      => '#',
                'secondary_link_text'      => 'Watch video',
                'secondary_link_target'    => '#',
                'custom_hero_section_html' => NULL,
                'show_featured_categories' => 1,
                'show_bestsellers'         => 1,
                'custom_fonts'             => '<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">',
                'font_name'                => 'Heebo, Noto Kufi Arabic'
            ),
        ));
        
        
    }
}