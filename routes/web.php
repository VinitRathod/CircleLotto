<?php

use App\Http\Controllers\Admin\CircleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\api\UserAuthController;
use App\Mail\OTPEmail;
use App\Mail\TestingMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/login', function () {
    return view('admin.auth.login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::middleware('logged_in')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    Route::get('/circles', [DashboardController::class, 'circles'])->name('circles');
    Route::get('getCircles', [CircleController::class, 'getCircles']);
    Route::get('circles/{id}', [CircleController::class, 'showCircle']);
    Route::post('/circles/delete/{id}', [CircleController::class, 'deleteCircle']);
    Route::post('/getDrawNumbers', [CircleController::class, 'get_draw_numbers']);

    Route::get('/winners', [DashboardController::class, 'winners']);
    Route::get('/winners/{id}', [DashboardController::class, 'winnersById']);
    Route::get('/getWinners', [DashboardController::class, 'getWinners']);
    Route::post('/getWinnersById', [DashboardController::class, 'getWinnersById']);

    Route::get('/user', [DashboardController::class, 'user']);
    Route::get('/deletedUser', [DashboardController::class, 'deleted_user']);
    Route::get('/getUsers', [UserController::class, 'getUsers']);
    Route::get('/getDeletedUsers', [UserController::class, 'getDeletedUsers']);
    Route::post('/delete/user', [UserController::class, 'deleteUser']);
    Route::post('/restore/user', [UserController::class, 'restoreUser']);
    Route::get('/user/{id}', [UserController::class, 'showUser']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/sendMessage', [DashboardController::class, 'send_message']);
});

Route::get('otp_email', function () {
    return view('emails.otp');
});

Route::get('winner_email', function () {
    return view('emails.winner');
});

Route::get('send_email', function () {
    $email = Mail::to("vinitrathodmeera@gmail.com")->send(new TestingMail());
    return $email;
    // return redirect('/');
});
