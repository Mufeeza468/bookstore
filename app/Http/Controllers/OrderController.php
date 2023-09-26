<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store()
    {
        $order = new Order([
            'user_id' => auth()->user()->id,
            // Get the logged-in user's ID
            'total_amount' => 0,
            // Set the initial total amount to 0
            'status' => 'pending',
        ]);
        $order->save();

        // Return the newly created order as a response
        return response()->json(['order' => $order], 201);
    }
    public function addToCart(Request $request, $id)
    {
        // Get the authenticated user (assuming you have authentication set up)
        $user = auth()->user();

        // Creating cart/order for user
        if (!$user->order) {
            $order = new Order();
            $user->order()->save($order);
        } else {
            $order = $user->order;
        }

        // Find the book by ID
        $book = Book::find($id);

        // Create a new cart item and associate it with the cart
        $item = new Item([
            'book_id' => $book->id,
            'quantity' => $request->input('quantity', 1),
        ]);

        $item->subtotal = $book->price * $item->quantity;

        // Save the item and associate it with the order
        $order->items()->save($item);

        // Calculate the total amount for the order based on all items
        $totalAmount = $order->items->sum('subtotal');

        //return $totalAmount;
        // Update the total amount in the order
        $order->update(['total_amount' => $totalAmount]);
        $order->save();

        return response()->json(['message' => 'Added to Cart Successfully!']);
    }
}