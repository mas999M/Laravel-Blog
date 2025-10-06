<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        User::factory(100)->create();
        $categories = [
            "technology",
            'health',
            'science',
            'sports',
            'polities',
            'entertainment'
        ];

        foreach ($categories as $category){
            Category::create([
                'name'=>$category
            ]);

        }
        Post::factory(100)->create();
    }
}
