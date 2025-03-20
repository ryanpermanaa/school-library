<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'author' => fake()->name(),
            'cover_path' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fassets.visme.co%2Ftemplates%2Fbanners%2Fthumbnails%2Fi_Novel-Book-Cover_full.jpg&f=1&nofb=1&ipt=ddcb3864cabf157ba6a60f40089927e161abb5734a8b10667db4721a541e7c9f&ipo=images',
            'category_id' => Category::inRandomOrder()->first()->id,
            'is_available' => true
        ];
    }
}
