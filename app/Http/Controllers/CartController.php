<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{

    // public function create()
    // {
    //     $user = auth()->user(); // Assuming you have user authentication


    //     if ($user) {
    //         // User is authenticated, create a cart associated with the user
    //         $cart = new Cart();
    //         $cart->user_id = $user->id;
    //         $cart->save();
    //     }
    //     return response()->json(['message' => 'Cart Created Successfully']);

    // }
    public function addToCart(Request $request, $id)
    {
        // Get the authenticated user (assuming you have authentication set up)
        $user = auth()->user();

        // Check if the user has an existing cart or create one if not
        if (!$user->cart) {
            $cart = new Cart(); // Assuming you have a "Cart" model
            $user->cart()->save($cart);
        }

        // Get the cart associated with the user
        $cart = $user->cart;

        // Find the book by ID
        $book = Book::find($id);

        // Create a new cart item and associate it with the cart
        $cartItem = new Item([
            'cart_id' => $cart->id,
            'book_id' => $book->id,
            'quantity' => $request->input('quantity', 1),
        ]);

        $cartItem->save();

        return response()->json(['message' => 'Added to Cart Successfully!']);
    }
}