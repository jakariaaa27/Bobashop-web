<?php

use Illuminate\Database\Seeder;

class DefaultSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
              'name'    	=> 'Administrator',
              'email'       => 'administrator@gmail.com',
              'password'  	=> bcrypt('admin123'),
              'status'  	=> 'admin',
              'photo'       => 'default_admin.png',
              'created_at'  => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);

        \App\Setting::insert([
            [
              'site_name'         => 'Wonderfull Indonesia',
              'site_desc'         => 'This website provides information about tourist attractions in Indonesia. information submitted regarding information on the types of places and recommendations of trusted tour guides',
              'logo_text1'        => 'Won',
              'logo_text2'        => 'Indo',
              'footer_backend'    => 'Wonderfull Indonesia | By Jakaria',
              'background_login'  => 'default-backgroug-login.jpg',
              'logo'              => 'default_logo.png',
              'simple_text'       => 'Website information about taourist attractions in Indonesia',
              'footer_frontend'   => 'Wonderfull Indonesia | By Jakaria',
              'front_logo'        => 'default-front-logo.png',
              'jumbotron'         => 'default_jumbotron.jpg',
              'created_at'        => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
