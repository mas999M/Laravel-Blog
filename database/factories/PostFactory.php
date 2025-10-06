<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title'=>$title,
            'image'=>fake()->imageUrl(),
            'slug'=>\Illuminate\Support\Str::slug($title),
            'content'=>fake()->paragraph(),
            'categories_id'=> Category::inRandomOrder()->first()->id,
            'users_id'=>$this->faker->numberBetween(1,100),
            'published_at'=>fake()->optional()->dateTime(),

        ];
    }
}
