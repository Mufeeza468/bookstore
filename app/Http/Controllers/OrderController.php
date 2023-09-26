<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // Get the authenticated user (assuming you have authentication set up)
        $user = auth()->user();

        // Check if the user has an existing cart/order or create one if not
        if (!$user->order) {
            $order = new Order(); // Assuming you have a "Cart" model
            $user->order()->save($order);
        }

        // Get the order associated with the user
        $order = $user->order;

        // Find the book by ID
        $book = Book::find($id);

        // Create a new cart item and associate it with the cart
        $Item = new Item([
            'cart_id' => $order->id,
            'book_id' => $book->id,
            'quantity' => $request->input('quantity', 1),
        ]);

        $Item->save();

        return response()->json(['message' => 'Added to Cart Successfully!']);
    }
}