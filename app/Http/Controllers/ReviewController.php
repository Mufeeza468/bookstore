<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{
    public function addReview(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        //return $user_id;
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book Not Found']);

        }
        $request->validate([
            'text' => 'required',
        ]);

        // Create a new review
        $review = new Review([
            'user_id' => $user_id,
            'book_id' => $id,
            'text' => $request->text,
        ]);

        $review->save();

        return response()->json(['message' => 'Review created successfully'], 201);
    }

    public function showReview()
    {
        return Review::all();
    }
}