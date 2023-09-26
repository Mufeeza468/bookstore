<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getBooks()
    {
        $books = Book::all();
        return response()->json(['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addBooks(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'cover_image' => 'nullable',
            'price' => 'required',
        ]);

        $book = Book::create($validatedData);

        return response()->json(['message' => 'Book Added Successfully!']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showBooks($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBooks(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book Not Found']);
        }

        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->description = $request['description'];
        $book->cover_image = $request['cover_image'];
        $book->price = $request['price'];

        $book->save();

        return response()->json([
            'message' => "Book Updated Successfully"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteBooks($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book Not Found']);
        }
        $book->delete();

        return response()->json(['message' => 'Book Deleted Successfully']);
    }
}