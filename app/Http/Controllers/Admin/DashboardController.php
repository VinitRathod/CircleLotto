<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circles;
use App\Models\User;
use App\Models\Winners;
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
            $circles = Circles::with(['user'])->where('deleted_at', '=', null)->get();
            // dd($circles);
            return view('admin.circles.index', ['circles' => $circles]);
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors([
                'pageError' => $e->getMessage(),
            ]);
        }
    }

    public function winners(Request $request)
    {
        try {
            return view('admin.winners.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->withErrors(['pageError' => $e->getMessage()]);
        }
    }

    public function getWinners()
    {
        try {
            $winners = Winners::with(['circle', 'user'])->where('deleted_at', null)->get();
            return $this->httpResponse(200, 200, "Winners Fetched", $winners);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }

    public function user()
    {
        try {
            // $users = User::all();
            // return view('admin.users.index', ['users' => $users]);
            return view('admin.users.index');
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors(['pageError' => $e->getMessage()]);
        }
    }
}
