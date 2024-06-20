<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*$users = User::factory(10)
            ->has(Post::factory(20))
            ->create();*/

        $users = User::factory(10)->create();

        /*$henry = User::factory()->create([
            'name' => 'henry',
            'email' => 'henry@mail.com',
        ]);*/

        /*$users[] = $henry;*/

        $posts = Post::factory(200)
            ->recycle($users)
            ->create();

        $comments = Comment::factory(100)
            ->recycle($users)
            ->recycle($posts)
            ->create();

        $henry = User::factory()
            ->has(Post::factory(45))
            ->has(Comment::factory(129)->recycle($posts))
            ->create([
            'name' => 'henry',
            'email' => 'henry@mail.com',
        ]);
    }
}
