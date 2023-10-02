<?php

namespace App\Services;

use App\Models\Book;

class WishlistService
{

    //add book to wishlist
    public function add($bookId)
    {
        $user = auth()->user()->load('wishlist'); //wishlist relationship
        $book = Book::find($bookId);

        // Check if the book is already in the user's wishlist
        if (!$user->wishlist->contains($book)) {
            $user->wishlist()->attach($book);
            return;
        }
        return -1;
    }


    //delete book from wishlist
    public function delete($bookId)
    {
        $user = auth()->user();
        $book = Book::find($bookId);

        if ($user->wishlist->contains($book)) {
            $user->wishlist()->detach($book);
            return;
        }
        return -1;
    }

    //getting all books in wishlist
    public function get()
    {
        $user = auth()->user();
        $wishlistItems = $user->wishlist;

        $list = [];

        foreach ($wishlistItems as $item) {
            $list[] = "book_id: $item->id";
        }
        return $list;
    }

}