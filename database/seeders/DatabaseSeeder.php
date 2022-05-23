<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        City::create([
            'name' => 'City 1'
        ]);

        City::create([
            'name' => 'City 2'
        ]);

        
        City::create([
            'name' => 'City 3'
        ]);
    }
}
