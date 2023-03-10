<?php

use App\Http\Controllers\Admin\AdminPassengerController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// post login
Route::post('/login',[AuthController::class,'login']);

// post register
Route::post('/register',[AuthController::class,'register']);

// 
Route::get('/get-passengers',[AdminPassengerController::class,'getPassengers']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});