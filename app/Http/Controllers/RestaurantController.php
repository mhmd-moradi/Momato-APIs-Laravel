<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function getAllRestaurants($id = null){
        if($id != null)
            $restaurants = Restaurant::find($id);
        else
            $restaurants = Restaurant::all();
        
        return response()->json([
            "status" => "Success",
            "restaurants" => $restaurants
        ], 200);
    }
}
