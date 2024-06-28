<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all posts
        $posts = Post::all();
        // Fetch all users
        $users = User::all();

        foreach ($posts as $post) {
            for ($i = 0; $i < 3; $i++) {
                // Pick a random user
                $randomUser = $users->random();
                // Create a comment
                Comment::create([
                    'user_id' => $randomUser->id,
                    'post_id' => $post->id,
                    'comment' => 'This is a random comment from user ' . $randomUser->id,
                ]);
            }
        }
    }
}
