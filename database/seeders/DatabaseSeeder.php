<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        Country::factory(10)->create();
        State::factory(100)->create();
        City::factory(500)->create();
        Post::factory(1)->create();
        Category::factory(10)->create();
          Comment::factory(10)->create();
        User::all()->each(function ($user) {
            $user->contact()->create(
                Contact::factory()->make()->toArray()
            );
        });
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
