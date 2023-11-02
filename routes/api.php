<?php

use App\Http\Controllers\api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('v1/register',[UserAuthController::class,'user_register']);
Route::post("v1/login",[UserAuthController::class,"login"]);

Route::middleware('auth:api')->group(function () {
    Route::post('v1/logout',[UserAuthController::class,'logout']);
    // Route::get("/example",[UserAuthController::class,"example"]);
});
