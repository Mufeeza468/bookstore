<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Item;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $user = auth()->user();
        $book = Book::find($id);

        // Check if user already ordered
        $confirmedOrder = $user->order()->where('status', 'processing')->first();
        // return $confirmedOrder;
        // Creating cart/order for user

        if (!$confirmedOrder) {
            if (!$user->order) {
                $order = new Order();
                $user->order()->save($order);
            } else {
                $order = $user->order;
            }
        } else {
            if ($user->order) {
                $order = new Order();
                $user->order()->save($order);
            } else {
                // $order = $user->order;
            }
        }



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

    public function confirmOrder(Request $request)
    {
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity');

        $book = Book::find($bookId);
        $subtotal = $book->price * $quantity;

        $user = auth()->user();

        $order = new Order([
            'user_id' => auth()->user()->id,
            'total_amount' => $subtotal,
            'status' => 'processing',
        ]);
        $order->save();

        $orderItem = new Item([
            'order_id' => $order->id,
            'book_id' => $bookId,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
        ]);
        $orderItem->save();

        $totalAmount = $order->items->sum('subtotal');

        // Update the total amount in the order
        $order->total_amount = $totalAmount;
        $order->save();

        $transaction = new Transaction([
            'user_id' => $user->id,
            'order_id' => $order->id,
        ]);
        $transaction->save();

        // Return a response that order was confirmed
        return response()->json(['message' => 'Order confirmed successfully']);

    }
}