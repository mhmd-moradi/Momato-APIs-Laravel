<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get_users/{id?}', [UserController::class, 'getAllUsers']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/add_user', [UserController::class, 'addUser']);
Route::post('/update_user', [UserController::class, 'updateUser']);

Route::get('/get_restaurants/{id?}', [RestaurantController::class, 'getAllRestaurants']);
Route::post('/add_restaurant', [RestaurantController::class, 'addRestaurant']);

Route::get('/get_reviews/{id?}', [ReviewController::class, 'getAllReviews']);
Route::get('/get_onhold_reviews', [ReviewController::class, 'getOnholdReviews']);
Route::get('/get_approved_reviews/{id}', [ReviewController::class, 'getApprovedReviews']);
Route::post('/add_review', [ReviewController::class, 'addReview']);
Route::post('/accept_review', [ReviewController::class, 'acceptReview']);
Route::post('/decline_review', [ReviewController::class, 'declineReview']);
