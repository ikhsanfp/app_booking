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
            'namapemain' => 'Nanon Korapat',
            'email' => 'nnn@gmail.com',
            'nohp' => '066839573774',
            'password' => bcrypt('1017')
        ]);

    }
}
