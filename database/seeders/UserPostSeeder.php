<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class UserPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory()->count(10)->create()->each(function ($user) {
            // Create 1 post for each user
            Post::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
