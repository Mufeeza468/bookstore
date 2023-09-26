<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Details;
use App\Models\Review;
use Illuminate\Http\Request;

class DetailsController extends Controller
{

    public function addDetails(Request $request, $id)
    {
        $bookDetail = Details::create([
            'book_id' => $id,
            'rating' => $request->input('rating'),

        ]);

        return response()->json(['book_detail' => $bookDetail]);
    }

    public function showDetails($bookId)
    {
        //Checking if book exists 
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        $reviews = Review::where('book_id', $bookId)
            ->select('user_id', 'text') // Specify the columns you want
            ->get();


        $rating = Details::where('book_id', $book->id)->get();
        $avgratings = $rating->avg('rating');

        $relatedBooks = Book::where('author', $book->author)
            ->where('id', '<>', $bookId)
            ->pluck('title');

        return response()->json([
            'book_id' => $bookId,
            'reviews' => $reviews,
            'rating' => $avgratings,
            'related_books' => $relatedBooks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Details $details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Details $details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Details $details)
    {
        //
    }
}