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

    public function addReview(Request $request){
        $review = new Review;
        $review->user_id = $request->user_id;
        $review->restaurant_id = $request->restaurant_id;
        $review->status = 1;
        $review->description = $request->description;
        $review->date = $request->date;
        $review->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }

    public function acceptReview(Request $request){
        Review::where('id', $request->review_id)->update([
            'status'=> 2
        ]);

        return response()->json([
            "status" => "Success"
        ], 200);
    }

    public function declineReview(Request $request){
        Review::where('id', $request->review_id)->update([
            'status'=> 3
        ]);

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
