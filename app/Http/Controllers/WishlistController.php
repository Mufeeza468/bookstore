<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    //Adding book to wishlist
    public function addToList(Request $request, $bookId)
    {
        $user = auth()->user()->load('wishlist'); //wishlist relationship
        $book = Book::find($bookId);

        // Check if the book is already in the user's wishlist
        if (!$user->wishlist->contains($book)) {
            $user->wishlist()->attach($book);
            return response()->json(['message' => 'Book added to wishlist.']);
        }
        return response()->json(['message' => 'Book is already in the wishlist.']);
    }


    //Deleting book from wishlist
    public function deleteInList(Request $request, $bookId)
    {
        $user = auth()->user();
        $book = Book::find($bookId);

        if ($user->wishlist->contains($book)) {
            $user->wishlist()->detach($book);
            return response()->json(['message' => 'Book removed from wishlist.']);
        }
        return response()->json(['message' => 'Book is not in the wishlist.']);
    }


    //Getting user's wishlist
    public function getList()
    {
        $user = auth()->user();
        $wishlist = $user->wishlist->pluck('id');
        return response()->json(['wishlist' => $wishlist]);
    }

}