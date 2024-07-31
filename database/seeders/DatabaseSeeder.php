<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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

        User::create([
            'namapemain' => 'ikhsan',
            'email' => 'raulkojiro@yahoo.com',
            'nohp' => '066839573774',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'namapemain' => 'Ferry',
            'email' => 'ferry@gmail.com',
            'nohp' => '066839573774',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'namapemain' => 'Doni',
            'email' => 'doni@gmail.com',
            'nohp' => '066839573774',
            'password' => bcrypt('123456')
        ]);
        $this->call([
            ImageSeeder::class,
        ]);
    }
}
