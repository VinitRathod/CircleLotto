<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminMessages;
use App\Models\Circles;
use App\Models\User;
use App\Models\Winners;
use Exception;
use Google\Service\AIPlatformNotebooks\Expr;
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
            $pubCircles = Circles::with(['user'])->withCount(['group_members'])->where('circle_type', 2)->where('deleted_at', '=', null)->get();
            $priCircles = Circles::with(['user'])->withCount(['group_members'])->where('circle_type', 1)->where('deleted_at', '=', null)->get();
            // dd($circles);
            return view('admin.circles.index', ['pubCircles' => $pubCircles, 'priCircles' => $priCircles]);
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

    public function deleted_user()
    {
        try {
            return view('admin.users.deletedusers');
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors(['pageError' => $e->getMessage()]);
        }
    }

    public function send_message(Request $request)
    {
        try {
            // dd($request->all());
            $admin_id = session()->get('user')->id;
            // dd(session()->get('user'));
            AdminMessages::create(['from_admin_user' => $admin_id, 'to_user' => $request->user_id, 'text' => $request->text]);
            // return response()->json(['status' => 200, 'message' => "Message Shared Successfully"], 200);
            return $this->httpResponse(200, 200, "Message Shared Successfully");
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
            // return response()->json(['status' => 500, 'message' => "" . $e->getMessage()], 500);
        }
    }
}
