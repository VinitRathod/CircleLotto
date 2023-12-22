<?php

use App\Http\Controllers\api\CircleController;
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

Route::post('v1/register', [UserAuthController::class, 'user_register']);
Route::post("v1/login", [UserAuthController::class, "login"]);

Route::middleware('auth:api')->group(function () {
    Route::get('v1/luckyDipNumbers', [CircleController::class, 'luckyDip']);
    Route::post('v1/addNewNumbers', [CircleController::class, 'addNewNumbers']);
    Route::get('v1/savedNumbersList', [CircleController::class, 'savedNumbersList']);
    Route::post('v1/editSavedNumbers/{id}', [CircleController::class, 'editSavedNumbers']);
    Route::get('v1/deleteSavedNumbers/{id}', [CircleController::class, 'deleteSavedNumbers']);
    Route::post('v1/logout', [UserAuthController::class, 'logout']);
    Route::post('v1/startCircle', [CircleController::class, 'create_circle']);
    // Route::get("/example",[UserAuthController::class,"example"]);
});
Route::get('v1/winner', [CircleController::class, 'drawWinner']);
Route::post('v1/joinCricle', [CircleController::class, 'joinCircle']);
