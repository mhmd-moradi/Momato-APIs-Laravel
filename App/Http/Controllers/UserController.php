<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers($id = null){
        if($id != null)
            $users = User::find($id);
        else
            $users = User::all();
        
        return response()->json([
            "status" => "Success",
            "users" => $users
        ], 200);
    }
}
