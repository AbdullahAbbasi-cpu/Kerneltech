<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset the admins table
         */
        if (\App::environment('local')) {
            \DB::table('admins')->truncate();
        }

        \DB::table('admins')->insert([
            'first_name'      => 'Administrator',
            'last_name'       => '',
            'phone'           => '123456789',
            'image'           => '',
            'email'           => 'admin@gmail.com',
            'password'        => bcrypt('admin'),
            'is_active'       => 1,
            'is_system_admin' => 1,
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s')
        ]);

        \DB::table('admins')->insert([
            'first_name'      => 'Admin',
            'last_name'       => 'Javelin',
            'phone'           => '',
            'image'           => '',
            'email'           => 'admin@javelinfund.ca',
            'password'        => bcrypt('jjd@jdsM1AL43#'),
            'is_active'       => 1,
            'is_system_admin' => 1,
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s')
        ]);
    }
}
