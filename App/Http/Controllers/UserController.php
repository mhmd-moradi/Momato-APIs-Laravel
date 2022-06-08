<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request){
        if (Auth::attempt([
            'username' => $request->username, 
            'password' => $request->password
        ]))
            $user = Auth::user();
        else
            $user = [];

        return response()->json([
            "status" => "Success",
            "users" => $user
        ], 200);
    }
}
