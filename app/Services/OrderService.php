<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Item;
use App\Models\Order;
use App\Models\Transaction;


class OrderService
{

    public function confirm(array $data)
    {
        $bookId = $data['book_id'];
        $quantity = $data['quantity'];

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

        // $transaction = new Transaction([
        //     'user_id' => $user->id,
        //     'order_id' => $order->id,
        // ]);
        // $transaction->save();

        return response();
    }

    public function get()
    {
        return Order::all();
    }

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