<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = [1, 2, 3, 4, 5]; 

        return [
            'title' => fake()->text(50),
            'content' => fake()->text(200),
            'category_id' => $this->faker->randomElement($categoryIds),
            
        ];
    }
}
