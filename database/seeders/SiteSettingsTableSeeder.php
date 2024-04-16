<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset the site_settings table
         */
        if (\App::environment() == 'local') {
            \DB::table('site_settings')->truncate();
        }

        \DB::table('site_settings')->insert([
            'site_title'      => 'Kerneltech',
            'contact_email'   => 'info@kerneltech.net',
            'pakistan_contact_number'   => '03132686223',
            'pakistan_address'         => 'Nazimabad no 3, Karachi, Pakistan',
            'london_contact_number'   => '447500978602',
            'london_address'         => '29 Oldchurch Road, Romford, London RM7 0BG',
            'main_logo'            => '',
            'facebook'        => 'https://facebook.com/kerneltech',
            'twitter'         => 'https://twitter.com/kerneltech',
            'linkedin'          => 'https://linkedin.com/kerneltech',
            'google'         => 'https://google.com/kerneltech',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s')
        ]);
    }
}
