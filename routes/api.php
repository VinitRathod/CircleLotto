<?php

use App\Http\Controllers\api\CircleController;
use App\Http\Controllers\api\UserAuthController;
use App\Http\Controllers\Controller;
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
    Route::post('v1/addSavedNumbers', [CircleController::class, 'addSavedNumbers']);
    Route::get('v1/savedNumbersList', [CircleController::class, 'savedNumbersList']);
    Route::post('v1/editSavedNumbers/{id}', [CircleController::class, 'editSavedNumbers']);
    Route::get('v1/deleteSavedNumbers/{id}', [CircleController::class, 'deleteSavedNumbers']);
    Route::post('v1/logout', [UserAuthController::class, 'logout']);
    Route::post('v1/startCircle', [CircleController::class, 'create_circle']);
    Route::post('v1/joinCricle', [CircleController::class, 'joinCircle']);
    Route::post('v1/verifyUser', [CircleController::class, 'verify_user']);

    Route::get('v1/userCircles', [CircleController::class, 'user_circles']);
    Route::post('v1/myCircles', [CircleController::class, 'my_circles']);
    Route::get('v1/userCreatedCircle', [CircleController::class, 'userCreatedCircle']);

    Route::post('v1/removeUser', [CircleController::class, 'remove_user']);
    Route::post('v1/groupMembers', [CircleController::class, 'get_group_members']);
    Route::post('v1/drawNumbers', [CircleController::class, 'get_draw_numbers']);;
    // Route::get("/example",[UserAuthController::class,"example"]);

    // Notifications Api
    Route::get('v1/notificationList', [CircleController::class, 'notification_list']);
    Route::post('v1/getUnreadCount', [CircleController::class, 'get_unread_count']);
    Route::post('v1/readAll', [CircleController::class, 'read_all_texts']);

    // Message API
    Route::get('v1/messageList', [CircleController::class, 'message_list']);
});

Route::get('switchFunctionality', [Controller::class, 'switch_functionality']);
Route::post('v1/verifyOtp', [UserAuthController::class, 'verify_otp']);
Route::post('v1/resendOtp', [UserAuthController::class, 'resend_otp']);
Route::post('v1/winner', [CircleController::class, 'drawWinner']);
Route::post('v1/searchCricle', [CircleController::class, 'searchCircle']);
Route::get('circles', [CircleController::class, 'circles']);
Route::get('getFriday', [CircleController::class, 'getFriday']);
Route::get('getMonth', [CircleController::class, 'getMonth']);
Route::get('v1/getWinnerNumber', [CircleController::class, 'get_winner_number']);
Route::post('v1/getWinningNumberDateRange', [CircleController::class, 'get_date_range_winner_number']);
