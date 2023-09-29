<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddReviewRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{

    //adding a review to a book
    public function addReviews($id, AddReviewRequest $request, ReviewService $reviewService)
    {
        $validate = $request->validated();
        $response = $reviewService->add($id, $validate);
        if ($response === -1) {

            return response()->json(['message' => 'Book Not Found'], 401);
        }
        return response()->json(['message' => 'Review created successfully'], 200);
    }


    //getting all reviews
    public function showReviews(ReviewService $reviewService)
    {
        $response = $reviewService->show();
        return response()->json([
            'reviews' => $response,
        ], 200);
    }


    //Updating reviews
    public function updateReviews($id, UpdateReviewRequest $request, ReviewService $reviewService)
    {
        $validate = $request->validated();
        $response = $reviewService->update($id, $validate);
        if ($response === -1) {
            return response()->json(['message' => 'You can not edit this review']);
        }
        return response()->json(['message' => 'Review Updated Succesfully']);

    }
}