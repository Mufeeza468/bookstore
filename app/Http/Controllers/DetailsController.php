<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Details;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookDetail = Details::create([
            'book_id' => $request->input('book_id'),
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
            //  'related_books' => $this->determineRelatedBooks($request->input('book_id')),
        ]);

        return response()->json(['book_detail' => $bookDetail]);
    }

    /**
     * Display the specified resource.
     */
    public function show($bookId)
    {
        //Checking if book exists 
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        //Getting details against book_id
        $bookDetails = Details::where('book_id', $bookId)->get();
        if ($bookDetails->isEmpty()) {
            return response()->json(['message' => 'No details available for this book.'], 404);
        }

        $reviews = $bookDetails->pluck('review');
        $ratings = $bookDetails->pluck('rating');

        $relatedBooks = Book::where('author', $book->author)
            ->where('id', '<>', $bookId)
            ->get();

        return response()->json([
            'book_id' => $bookId,
            'reviews' => $reviews,
            'rating' => $ratings,
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