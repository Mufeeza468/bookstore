<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    //adding a review to book
    public function add($id, array $data)
    {

        $user_id = Auth::user()->id;
        //return $user_id;
        $book = Book::find($id);
        if (!$book) {
            return -1;
        }
        $review = Review::create([
            'user_id' => $user_id,
            'book_id' => $id,
            'text' => $data['text'],
        ]);
        return $review;
    }


    //getting all reviews
    public function show()
    {
        return Review::all();
    }


    //user updating his reviews
    public function update($id, array $data)
    {
        $review = Review::find($id);
        if ($review->user_id !== auth()->user()->id) {
            return -1;
        }
        return $review->update([
            'text' => $data['text'],
        ]);

    }

    public function delete($id)
    {

    }

}