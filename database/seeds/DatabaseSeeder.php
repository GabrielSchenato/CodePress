<?php

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeUser\Models\User;
use CodePress\CodePosts\Models\Post;
use CodePress\CodePosts\Models\Comment;
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
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create();
        factory(Category::class, 5)->create();
        factory(Post::class, 10)->create()->each(function ($post) {
            foreach (range(1, 10) as $value) {
                $post->comments()->save(factory(Comment::class)->make());
            }
        });

        $this->command->info("Finished Seeders!");
    }

}
