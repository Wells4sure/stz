<?php

use Illuminate\Database\Seeder;
use App\User;

class BusinessUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'   =>   'Wellington',
            'last_name'    =>   'Chanda',
            'slug'  => 'wellington-chanda',
            'email'    =>   'test@test.com',
            'date_of_birth' => '1991-02-19',
            'phone' =>   '0969525359',
            'active'   =>   1,
            'role' => 'business_owner',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
    }
}
