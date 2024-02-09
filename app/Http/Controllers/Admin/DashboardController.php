<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circles;
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
            return back()->withErrors([
                'pageError' => $e->getMessage(),
            ]);
        }
    }

    public function circles()
    {
        try {
            $circles = Circles::with(['user'])->get();
            // dd($circles);
            return view('admin.circles.index', ['circles' => $circles]);
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors([
                'pageError' => $e->getMessage(),
            ]);
        }
    }
}
