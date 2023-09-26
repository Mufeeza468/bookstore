<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */


class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'title' => $faker->sentence,
            'author' => $faker->name,
            'description' => $faker->paragraph,
            'cover_image' => 'book-cover.jpg',
            'price' => $faker->randomFloat(2, 10, 100),
        ];
    }
}