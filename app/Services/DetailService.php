<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Details;
use App\Models\Review;

class DetailService
{
    //add rating to book
    public function add($id, array $data)
    {
        $bookDetail = Details::create([
            'book_id' => $id,
            'rating' => $data['rating'],

        ]);

        return $bookDetail;
    }


    //show book details
    public function show($bookId)
    {
        $book = Book::find($bookId);
        if (!$book) {
            return -1;
        }

        $reviews = Review::where('book_id', $bookId)
            ->select('user_id', 'text') // Specify the columns you want
            ->get();


        $rating = Details::where('book_id', $book->id)->get();
        $avgratings = $rating->avg('rating');

        //Rounded the rating to 1 decimal point
        $roundedAvgRating = round($avgratings, 1);

        $relatedBooks = Book::where('author', $book->author)
            ->where('id', '<>', $bookId)
            ->pluck('cover_image');

        return ([
            'book_id' => $bookId,
            'reviews' => $reviews,
            'rating' => $roundedAvgRating,
            'related_books' => $relatedBooks,
        ]);
    }
}