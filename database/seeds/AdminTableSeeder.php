<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Admin::create(array(
            'display_admin'     => 'Alfan Ghinan Rusydi',
            'admin_name' => 'alfangr',
            'admin_email'    => 'alfangr05@gmail.com',
            'admin_password' => Hash::make('alfangr05@gmail.com'),
        ));
    }
}
