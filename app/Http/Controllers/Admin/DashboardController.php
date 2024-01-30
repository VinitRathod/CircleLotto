<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //

    public function index()
    {
        try {
            return view('admin.dashboard');
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
