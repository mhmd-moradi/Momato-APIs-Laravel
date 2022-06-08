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

    public function addRestaurant(Request $request){
        $resto = new Restaurant;
        $resto->type = $request->category;
        $resto->created_by = $request->user;
        $resto->restaurant_name = $request->name;
        $resto->location = $request->location;
        $resto->image = $request->image;
        $resto->opening_time = $request->opening_time;
        $resto->closing_time = $request->closing_time;
        $resto->save();

        return response()->json([
            "status" => "Success",
            "restaurant_id" => $resto->id
        ], 200);
    }
}
