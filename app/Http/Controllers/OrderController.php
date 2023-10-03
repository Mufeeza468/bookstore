<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmOrderRequest;
use App\Models\Book;
use App\Models\Item;
use App\Models\Order;
use App\Models\Transaction;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirmOrders(ConfirmOrderRequest $request, OrderService $orderService)
    {
        $response = $orderService->confirm($request);
        if (!$response) {
            return response()->json(['message' => 'Something Went Wrong']);
        }
        return response()->json(['message' => 'Order confirmed successfully']);

    }

    public function getOrders(OrderService $orderService)
    {
        $response = $orderService->get();
        return response()->json(['orders' => $response]);

    }

    public function userOrders(OrderService $orderService)
    {
        $response = $orderService->order();
        if (!$response) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 401);
        }
        return response()->json(['orders' => $response]);
    }

    // public function addToCart(Request $request, $id)
    // {
    //     $user = auth()->user();
    //     $book = Book::find($id);

    //     // Check if user already ordered
    //     $confirmedOrder = $user->order()->where('status', 'processing')->first();
    //     // return $confirmedOrder;
    //     // Creating cart/order for user

    //     if (!$confirmedOrder) {
    //         if (!$user->order) {
    //             $order = new Order();
    //             $user->order()->save($order);
    //         } else {
    //             $order = $user->order;
    //         }
    //     } else {
    //         if ($user->order) {
    //             $order = new Order();
    //             $user->order()->save($order);
    //         } else {
    //             // $order = $user->order;
    //         }
    //     }
    //     // Create a new cart item and associate it with the cart
    //     $item = new Item([
    //         'book_id' => $book->id,
    //         'quantity' => $request->input('quantity', 1),
    //     ]);
    //     $item->subtotal = $book->price * $item->quantity;
    //     // Save the item and associate it with the order
    //     $order->items()->save($item);

    //     // Calculate the total amount for the order based on all items
    //     $totalAmount = $order->items->sum('subtotal');

    //     //return $totalAmount;
    //     // Update the total amount in the order
    //     $order->update(['total_amount' => $totalAmount]);
    //     $order->save();

    //     return response()->json(['message' => 'Added to Cart Successfully!']);
    // }
}