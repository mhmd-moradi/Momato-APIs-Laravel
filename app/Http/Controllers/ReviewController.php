<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;

use App\Models\User;

class ReviewController extends Controller
{
    public function getAllReviews($id = null){
        if($id != null)
            $reviews = User::join('Reviews', 'Users.id', '=', 'Reviews.user_id')
            ->where('Reviews.restaurant_id', '=', $id)
            ->get(['Users.*', 'Reviews.*']);
        else
            $reviews = User::join('Reviews', 'Users.id', '=', 'Reviews.user_id')
            ->get(['Users.*', 'Reviews.*']);
        
        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }
}
