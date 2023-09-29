<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{

    //Adding Book
    public function addBooks(AddBookRequest $request, BookService $bookservice)
    {
        $validate = $request->validated();
        $response = $bookservice->add($validate);
        if (!$response) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 401);
        }
        return response()->json([
            'message' => 'Book Added Successfully',
        ], 200);
    }


    //Getting all books
    public function getBooks(BookService $bookService)
    {
        $response = $bookService->getAll();
        return response()->json([
            'books' => $response,
        ], 200);
    }


    //Getting a single book
    public function showBooks($id, BookService $bookService)
    {
        $response = $bookService->show($id);
        if (!$response) {
            return response()->json([
                'message' => 'Book not found',
            ]);
        }
        return response()->json([
            'book' => $response,
        ], 200);
    }


    //Updating a book
    public function updateBooks($id, UpdateBookRequest $request, BookService $bookService)
    {
        $validate = $request->validated();
        $response = $bookService->update($id, $validate);
        if ($response === -1) {
            return response()->json(['message' => 'Book Not Found']);
        }
        return response()->json([
            'message' => "Book Updated Successfully"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteBooks($id, BookService $bookService)
    {
        $response = $bookService->delete($id);
        if ($response === -1) {
            return response()->json(['message' => 'Book Not Found']);
        }
        return response()->json(['message' => 'Book Deleted Successfully']);
    }
}