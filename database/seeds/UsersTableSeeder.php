<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'   =>   'Administrator',
            'last_name'    =>   'Administrator',
            'slug'  => 'administrator',
            'email'    =>   'admin@admin.com',
            'date_of_birth' => '1991-02-19',
            'phone' =>   '0969525359',
            'active'   =>   1,
            'role' => 'admin',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
    }
}
