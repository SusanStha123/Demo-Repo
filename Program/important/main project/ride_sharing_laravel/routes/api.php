<?php

use App\Http\Controllers\ApiController;
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

// Login Api
Route::post('/login',[ApiController::class,'login']);

// Register Api Passenger
Route::post('/passenger-register',[ApiController::class,'passengerRegister']);
// Route::post('/user-register',function(){return 'hello';});


// Register Api Driver
Route::post('/driver-register',[ApiController::class,'driverRegister']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
