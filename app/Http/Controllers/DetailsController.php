<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDetailRequest;
use App\Models\Book;
use App\Models\Details;
use App\Models\Review;
use App\Services\DetailService;
use Illuminate\Http\Request;

class DetailsController extends Controller
{

    //adding rating to a book
    public function addDetails($id, AddDetailRequest $request, DetailService $detailService)
    {
        $validate = $request->validated();
        $response = $detailService->add($id, $validate);
        if (!$response) {
            return response()->json([
                'message' => 'Something went wrong',
            ], 401);
        }
        return response()->json([
            'message' => 'Rating Added Successfully',
        ], 200);
    }

    //show details of a book
    public function showDetails($bookId, DetailService $detailService)
    {
        $response = $detailService->show($bookId);

        if ($response === -1) {
            return response()->json(['message' => 'Book not found.'], 404);
        }
        return response()->json([
            'details' => $response,
        ], 200);

    }

}