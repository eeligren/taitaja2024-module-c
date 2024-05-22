<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\Result;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::create([
             'username' => 'admin',
             'password' => bcrypt('taitaja2024'),
             'is_admin' => true,
         ]);

        \App\Models\User::create([
            'username' => 'user',
            'password' => bcrypt('taitaja2024'),
        ]);

        Event::factory()->count(10)->create();
        Result::factory()->count(100)->create();

        \App\Models\Event::create([
            'title' => 'MATOPELI',
            'user_id' => 2
        ]);
    }
}
