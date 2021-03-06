<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Benjie B. Lenteria',
            'email' => 'lentrix@mdc.ph',
            'password' => bcrypt('password123'),
            'admin' => 1
        ]);

        $this->call(UserSeeder::class);
    }
}
