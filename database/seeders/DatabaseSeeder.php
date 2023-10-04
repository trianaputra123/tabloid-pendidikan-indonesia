<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'level' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Redaksi User',
            'email' => 'redaksi@example.com',
            'password' => bcrypt('password'),
            'level' => 'redaksi',
        ]);

        User::factory()->create([
            'name' => 'Reporter User',
            'email' => 'reporter@example.com',
            'password' => bcrypt('password'),
            'level' => 'reporter',
        ]);
    }
}
