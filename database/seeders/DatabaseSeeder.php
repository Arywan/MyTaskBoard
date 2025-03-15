<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 100 users with realistic names and emails
        User::factory(100)->create();

        // Create a test user with known credentials
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123456'),
        ]);

        // Generate some tasks (you can adjust the number)
        Task::factory(200)->create();
    }
}
