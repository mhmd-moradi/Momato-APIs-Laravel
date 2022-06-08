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

    public function getOnholdReviews(){
        $reviews = User::join('Reviews', 'Users.id', '=', 'Reviews.user_id')
        ->where('Reviews.status', '=', 1)
        ->get(['Users.*', 'Reviews.*']);
        
        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }

    public function getApprovedReviews($id = null){
        $reviews = User::join('Reviews', 'Users.id', '=', 'Reviews.user_id')
        ->where([
            ['Reviews.restaurant_id', '=', $id],
            ['Reviews.status', '=', 2]
        ])
        ->get(['Users.*', 'Reviews.*']);
        
        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }
}
