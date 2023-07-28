<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        // by stating 'user_id' => $user->id
        // you have only
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

    //     $user = User::factory()->create();

    //     $personal = Category::create([
    //         'name' => 'Personal',
    //         'slug' => 'personal'
    //     ]);


    //     $family = Category::create([
    //         'name' => 'Family',
    //         'slug' => 'family'
    //     ]);

    //     $work = Category::create([
    //         'name' => 'Work',
    //         'slug' => 'work'
    //     ]);

    //     Post::create([
    //         'user_id' => $user->id,
    //         'category_id' => $family->id,
    //         'title' => 'My Family Post',
    //         'slug' => 'my-first-post',
    //         'excerpt' => 'Lorem ipsum dolar sit amet. ',
    //         'body' => 'This is the first contents. this is the first contents. this is the first contents.'
    //     ]);

    //     Post::create([
    //         'user_id' => $user->id,
    //         'category_id' => $work->id,
    //         'title' => 'My Work Post',
    //         'slug' => 'my-work-post',
    //         'excerpt' => 'Lorem ipsum dolar sit amet. ',
    //         'body' => 'This is the first contents. this is the first contents. this is the first contents.'
    //     ]);
    }
}
