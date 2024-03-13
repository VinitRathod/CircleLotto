<?php

namespace App\Http\Controllers;

use App\Models\Circles;
use App\Models\GroupMembers;
use App\Models\Notifications;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function httpResponse($status, $intResponseCode, $message, $data = '')
    {
        $result = array();

        $result['status'] = $status;
        $result['message'] = $message == null ? 'success' : $message;

        if (!empty($data)) {
            $result['result'] = $data;
        }
        // dd($result);
        return response()->json($result, $intResponseCode);
    }

    public function accessTokenGenerater($user)
    {
        // DB::table('oauth_access_tokens')->where('user_id', '=', $user->id)->delete();
        $token = $user->createToken('Circle Lotto Login')->accessToken;
        return $token;
    }

    public function sendNotificationToAll($title, $body)
    {
        try {
            $fbNot = new FirebaseController();
            $usersToken = User::where('deleted_at', null)->where('firebase_token', '!=', null)->where('id', '!=', Auth::id())->get();
            // dd($usersToken);
            foreach ($usersToken as $token) {
                try {
                    $notifications = Notifications::create(['from_user' => Auth::id(), 'to_user' => $token->id, 'title' => $title, 'body' => $body, 'read_at' => null]);
                    $data_arr = ['notification_type' => '1', 'from_user' => "" . Auth::id(), 'to_user' => "" . $token->id, 'title' => $title, 'body' => $body, 'read_at' => null];
                    $resp = $fbNot->send_message($token->firebase_token, $title, $body, $data_arr);
                    // Log::error($resp);
                    // $resp = $resp->toArray();
                    // $resp = $resp->original;
                    // dd($resp);
                    if ($resp->original['status'] == '500') {
                        Log::error("Token Might be corrupted");
                        Log::error($token);
                        $notifications->update(['error' => $resp->original]);
                        // break;
                    }
                } catch (Exception $e) {
                    Log::error($e);
                    // break;
                    continue;
                }
            }

            return $this->httpResponse(200, 200, "Notifications Successfully Shared");
            // dd($usersToken);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function sendNotificationsToGroupAdmin($circle_id, $title, $body)
    {
        try {
            $circle = Circles::where('id', $circle_id)->where('deleted_at', null)->with(['user' => function (Builder $query) {
                $query->where('deleted_at', null)->where('firebase_token', '!=', null);
            }])->first();

            // dd($circle);
            if ($circle->user != null) {
                $user = $circle->user;
                $notifications = Notifications::create(['from_user' => Auth::id(), 'to_user' => $user->id, 'title' => $title, 'body' => $body, 'read_at' => null]);
                $fbNot = new FirebaseController();
                $data_arr = ['notification_type' => '2', 'from_user' => "" . Auth::id(), 'to_user' => "" . $user->id, 'title' => $title, 'body' => $body, 'read_at' => null];
                $resp = $fbNot->send_message($user->firebase_token, $title, $body, $data_arr);
                if ($resp->original['status'] == '500') {
                    $notifications->update(['error' => $resp->original]);
                }
            } else {
                return $this->httpResponse(200, 200, 'No User');
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function sendNotificationToASingleUser($user_id, $circle_id)
    {
        try {
            $circle = Circles::where('id', $circle_id)->first();
            $title = "You Have Won";
            $body = "You're the Winner of " . $circle->circle_name;
            $user = User::where('id', $user_id)->first();
            $data_arr = ['notification_type' => '3', 'from_user' => "0", 'to_user' => "" . $user->id, 'title' => $title, 'body' => $body, 'read_at' => null];
            $notifications = Notifications::create(['from_user' => 0, 'to_user' => $user->id, 'title' => $title, 'body' => $body, 'read_at' => null]);
            $fbNot = new FirebaseController();
            $resp = $fbNot->send_message($user->firebase_token, $title, $body, $data_arr);
            if ($resp->original['status'] == '500') {
                $notifications->update(['error' => $resp->original]);
            }
            return $this->httpResponse(200, 200, "Notification Shared Successfully");
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function sendNotificationtoGroupMembers($circle_id, $user_id)
    {
        try {
            $groupMembers = GroupMembers::where('circle_id', $circle_id)->with(['user' => function (Builder $query) use ($user_id) {
                $query->where('deleted_at', null)->where('firsbase_token', '!=', null)->where('id', '!=', $user_id);
            }])->get();
            $circle = Circles::where('id', $circle_id)->first();
            $winner = User::where('id', $user_id)->first();
            $title = "You have Not Won";
            $body = "$winner->first_name $winner->last_name is the winner in the group $circle->circle_name";
            $fbNot = new FirebaseController();
            foreach ($groupMembers as $member) {
                if (!empty($member->user) && count($member->user) > 0) {
                    $data_arr = ['notification_type' => 4, 'from_user' => "0", 'to_user' => "" . $member->user->id, 'title' => $title, 'body' => $body, 'read_at' => null];
                    $notifications = Notifications::create(['from_user' => "0", 'to_user' => $member->user->id, 'title' => $title, 'body' => $body, 'read_at' => null]);
                    $resp = $fbNot->send_message($member->user->firebase_token, $title, $body, $data_arr);
                    if ($resp->original['status'] == '500') {
                        $notifications->update(['error' => $resp->original]);
                    }
                }
            }
            return $this->httpResponse(200, 200, 'Notification Shared');
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }
}
