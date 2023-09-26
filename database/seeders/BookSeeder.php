<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = \App\Models\Book::create([
            'title' => 'Twisted Hates',
            'author' => 'Ana Huang',
            'description' => ' Read Twisted Hate now for a steamy enemies to lovers romance .',
            'cover_image' => 'book-cover.jpg',
            'price' => '30 ',
        ]);
    }
}