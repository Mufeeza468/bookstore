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
            'title' => 'It Ends With Us',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1688011813i/27362503.jpg',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'It Starts With Us',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781668001226/it-starts-with-us-9781668001226_hr.jpg',
            'price' => '35 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Confess',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781476791456/confess-9781476791456_lg.jpg',
            'price' => '25 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'November 9',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1447138036i/25111004.jpg',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Hopeless',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1666362713i/62967897.jpg',
            'price' => '40 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Too Late',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://i0.wp.com/thebookbloglife.com/wp-content/uploads/2019/06/Too-Late.jpg?fit=316%2C475&ssl=1',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Ugly Love',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1632597571i/17788401.jpg',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Maybe Someday',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://aestasbookblog.com/wp-content/uploads/2013/11/MAYBE-SOMEDAY-BL-658x1024.jpg',
            'price' => '38 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Never Never',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1667522795l/63120226.jpg',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'All Your Perfects',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://i0.wp.com/natashaisabookjunkie.com/wp-content/uploads/All-Your-Perfects_new.jpg?fit=966%2C1500&ssl=1',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Heart Bones',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1580936060l/51007311._SY475_.jpg?w=144',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Maybe Not',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1666362650i/62967891.jpg',
            'price' => '35',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Maybe Now',
            'author' => 'Collen Hoover',
            'description' => ' This is a sample book by Hoover.',
            'cover_image' => 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781668013342/maybe-now-9781668013342_hr.jpg',
            'price' => '25 ',
        ]);

        $book = \App\Models\Book::create([
            'title' => 'Twisted Hates',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana.',
            'cover_image' => 'https://anahuang.com/wp-content/uploads/2023/02/Screen-Shot-2023-02-10-at-11.47.30-AM-e1684639415404.png',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Twisted Love',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana..',
            'cover_image' => 'https://anahuang.com/wp-content/uploads/2023/02/Screen-Shot-2023-02-10-at-11.48.47-AM-e1684639355171.png',
            'price' => '35 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Twisted Games',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://anahuang.com/wp-content/uploads/2023/02/Screen-Shot-2023-02-10-at-11.47.19-AM-e1684639430949.png',
            'price' => '35',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Twisted Lies',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://anahuang.com/wp-content/uploads/2023/02/Screen-Shot-2023-02-10-at-11.47.40-AM.png',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'King of Greed',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1687764099i/124943221.jpg',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'King of Wrath',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://anahuang.com/wp-content/uploads/2023/01/King-of-Wrath-ebook-scaled.jpg',
            'price' => '30 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'King of Pride',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1680192054i/62994279.jpg',
            'price' => '40 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'Twisted Dreams',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://m.media-amazon.com/images/I/51JCGVLsidL._SL500_.jpg',
            'price' => '35 ',
        ]);
        $book = \App\Models\Book::create([
            'title' => 'If the Sun Never Sets',
            'author' => 'Ana Huang',
            'description' => ' This is a sample book by Ana. .',
            'cover_image' => 'https://anahuang.com/wp-content/uploads/2022/12/If-the-Sun-Never-Sets-scaled.jpg',
            'price' => '30 ',
        ]);
    }
}