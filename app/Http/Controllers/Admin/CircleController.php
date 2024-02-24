<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circles;
use App\Models\DrawNumbers;
use Exception;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CircleController extends Controller
{
    //
    public function getCircles()
    {
        try {
            $circles = Circles::with(['user'])->where('deleted_at', '=', null)->get();
            return $this->httpResponse(200, 200, "Circles Fetched", $circles);
            // return response()->json(['status' => 200, 'message' => 'Circles Fetched', 'data' => $circles]);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, $e->getMessage());
            // return response()->json(['status' => 500, 'message' => "" . $e->getMessage()]);
        }
    }

    public function showCircle(Request $request, string $id)
    {
        try {
            // $circle = Circles::where('id', $id)->withCount(['group_members' => ['user' => ['draw_numbers']]])->first();
            $circle = Circles::where('id', $id)->with(['group_members' => ['user']])->first();
            // dd($circle->group_members);
            $users = $circle->group_members;
            return view('admin.circles.show', ['users' => $users, 'circle_name' => $circle->circle_name]);
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors(['pageError' => $e->getMessage()]);
            // return $this->httpResponse(500, 500, $e->getMessage());
            // return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }
    public function deleteCircle(string $id)
    {
        try {
            $circle = Circles::where('id', $id)->first();
            $circle->draw_numbers()->delete();
            $circle->group_members()->delete();
            $circle->delete();
            return $this->httpResponse(200, 200, "Circles Deleted Successfully");
            // return response()->json(['status' => 200, 'message' => "Circle Deleted Successfully"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, $e->getMessage());
            // return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
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

    public function get_draw_numbers(Request $request)
    {
        $validated = $request->validate([
            'circle_id' => 'required',
            'user_id' => 'required'
        ]);
        try {
            $draw_numbers = DrawNumbers::where(['circle_id' => $validated['circle_id'], 'user_id' => $validated['user_id']])->get();
            return $this->httpResponse(200, 200, "Details Fetched", $draw_numbers);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }
}
