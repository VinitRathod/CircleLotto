<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserCircles;
use App\Http\Resources\Admin\UserWin;
use App\Models\GroupMembers;
use App\Models\User;
use App\Models\Winners;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //

    public function getUsers()
    {
        try {
            $users = User::where('deleted_at', '=', null)->get();
            // $users = User::all();
            return $this->httpResponse(200, 200, "Users Fetched Successfully", $users);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }
    public function deleteUser(Request $request)
    {
        try {
            $user_id = $request->user_id;
            $user = new User();
            $user->deleteUser($user_id);
            return $this->httpResponse(200, 200, "User Deleted Successfully");
        } catch (Exception $e) {
            Log::error($e->getMessage());;
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function showUser(Request $request)
    {
        try {
            UserCircles::withoutWrapping();
            UserWin::withoutWrapping();
            $user = User::where('id', $request->id)->with(['user_details', 'circle', 'draw_numbers', 'saved_numbers', 'group_members'])->first();
            // dd($user->notifications_to);
            $groupMembers = GroupMembers::where('user_id', $request->id)->with(['circle' => ['user']])->get();
            $resGPM = UserCircles::collection($groupMembers)->response()->getData();

            $winners = Winners::where('user_id', $request->id)->with(['user', 'circle'])->get();
            $resWinners = UserWin::collection($winners)->response()->getData();
            // dd($resWinners);
            return view('admin.users.show', ['user' => $user, 'group_members' => $resGPM, 'winners' => $resWinners]);
            // dd($user);
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors([
                'pageError' => $e->getMessage(),
            ]);
            // return response()->json(['status' => 500, 'message' => "" . $e->getMessage()], 500);
        }
    }
}
