<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderService
{

    //Confired Orders
    public function confirm(Request $request)
    {
        $user = auth()->user();

        // Create a new order
        $order = new Order([
            'user_id' => $user->id,
            'status' => 'processing',
        ]);
        $order->save();

        $totalAmount = 0;

        // Check if the request contains 'book_id' and 'quantity' arrays
        if ($request->has('book_id') && $request->has('quantity')) {
            $bookIds = $request->input('book_id');
            $quantities = $request->input('quantity');

            // Iterate through the arrays
            foreach ($bookIds as $index => $bookId) {
                $quantity = $quantities[$index];

                // Find the book and calculate the subtotal
                $book = Book::find($bookId);
                $subtotal = $book->price * $quantity;

                // Create an order item
                $orderItem = new Item([
                    'book_id' => $bookId,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ]);

                // Associate the order item with the order
                $order->items()->save($orderItem);

                // Update the total amount with the subtotal of this item
                $totalAmount += $subtotal;
            }

            // Update the total amount in the order
            $order->total_amount = $totalAmount;
            $order->save();
        }

        return response();
    }

    //getting all orders
    public function get()
    {
        return Order::all();
    }


    //getting users orders
    public function order()
    {
        $user = auth()->user();
        if ($user) {
            $orders = Order::where('user_id', $user->id)->get();
            return $orders;
        }
        return -1;
    }
}