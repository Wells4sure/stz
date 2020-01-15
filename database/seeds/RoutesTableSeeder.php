<?php

use Illuminate\Database\Seeder;
use App\Route;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::create([
            'name'   =>   'LSK - NDL',
            'origin'   =>   'Lusaka',
            'destination'   =>   'Ndola',
            'slug'   =>   'lsk-ndl',
            'price'   =>   170,
        ]);
    }
}
