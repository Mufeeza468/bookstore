<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    //Adding book to wishlist
    public function addToList($bookId, WishlistService $wishlistService)
    {
        $response = $wishlistService->add($bookId);
        if ($response === -1) {
            return response()->json(['message' => 'Book is already in wishlist']);
        }
        return response()->json(['message' => 'Book added to wishlist']);


    }

    //Deleting book from wishlist
    public function deleteInList($bookId, WishlistService $wishlistService)
    {
        $response = $wishlistService->delete($bookId);
        if ($response === -1) {
            return response()->json(['message' => 'Book is not in the wishlist.']);
        }
        return response()->json(['message' => 'Book removed from wishlist.']);
    }


    //Getting user's wishlist
    public function getList(WishlistService $wishlistService)
    {
        $response = $wishlistService->get();
        return response()->json(['Wishlist' => $response]);
    }

}