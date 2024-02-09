<?php

use App\Http\Controllers\Admin\CircleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

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
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
