<?php

namespace App\Http\Controllers;

use App\Models\Circles;
use App\Models\GroupMembers;
use App\Models\Notifications;
use App\Models\User;
use Exception;
use Google_Client;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FirebaseController extends Controller
{
    //
    private $acc_token;
    private $apiurl;
    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig(base_path('circle-lotto-firebase-adminsdk-z5owa-ca2aac8a51.json'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $client->fetchAccessTokenWithAssertion();
        $token = $client->getAccessToken();
        $this->apiurl = 'https://fcm.googleapis.com/v1/projects/circle-lotto/messages:send';
        $this->acc_token = $token['access_token'];
    }

    // Notification Body Message
    /*
    {
   "message":{
      "token":"bk3RNwTe3H0:CI2k_HHwgIpoDKCIZvvDMExUdFQ3P1...",
      "notification":{
        "body":"This is an FCM notification message!",
        "title":"FCM Message"
        }
    }
    */
    public function send_message($token, $title, $body, $data_arr = array())
    {
        try {
            $message = array(
                'message' => array(
                    'token' => $token,
                    'notification' => array(
                        'body' => $body,
                        'title' => $title
                    ),
                ),
            );
            if (!empty($data_arr) && count($data_arr) > 0) {
                $message['message']['data'] = $data_arr;
            }
            $headers = array(
                'Authorization: Bearer ' . $this->acc_token,
                'Content-Type: application/json'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->apiurl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
            $res = curl_exec($ch);
            curl_close($ch);
            $resp = json_decode($res);
            // dd($resp);
            if (!isset($resp->error)) {
                return $this->httpResponse(200, 200, "Notification Send");
            } else {
                return $this->httpResponse(500, 500, $resp->error->message);
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function sendNotificationToAllCommad()
    {
        try {
            $users = User::all();
            foreach ($users as $user) {
                $this->send_message($user->firebase_token, "Your Amount is More", "A Notification to Remind you that you have more amount in the wallet");
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function sendCircleAdminGroupNotification()
    {
        try {
            $flag = true;
            $title = "Add Users";
            $body = "It seems that there are no users added in your group! Please Add Users to get more Money";
            $circles = Circles::where('deleted_at', null)->withCount(['group_members'])->with(['user'])->get();
            Log::error($circles);
            foreach ($circles as $value) {
                if ($value->group_members_count <= 1) {
                    $data_arr = ['notification_type' => '6', 'circle_type' => "" . $value->circle_type, 'circle_id' => "" . $value->id, 'circle_name' => "" . $value->circle_name];
                    $notifications = Notifications::create(['from_user' => "0", 'to_user' => $value->user->id, 'title' => $title, 'body' => $body, 'read_at' => null, 'icon' => 2]);
                    $resp = $this->send_message($value->user->firebase_token, $title, $body, $data_arr);
                    if ($resp->original['status'] == '500') {
                        $notifications->update(['error' => $resp->original]);
                        $flag = false;
                    }
                }
            }
            if (!$flag) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function sendReminderToVerifyTheUser()
    {
        try {
            $flag = true;
            $title = "Please Verify the Users";
            $body = "It seems that you haven't Verified Some Users Yet. Please Check and verify them!";
            $group_members = GroupMembers::where('verified', '0')->where('deleted_at', null)->with(['circle' => ['user']])->get();
            Log::error($group_members);
            foreach ($group_members as $value) {
                $firebase_token = $value->circle->user->firebase_token;
                $data_arr = ['notification_type' => '7', 'circle_type' => "" . $value->circle->circle_type, 'circle_id' => "" . $value->circle->id, 'circle_name' => "" . $value->circle->circle_name];
                $notifications = Notifications::create(['from_user' => "0", 'to_user' => $value->circle->user->id, 'title' => $title, 'body' => $body, 'read_at' => null, 'icon' => 2]);
                $resp = $this->send_message($firebase_token, $title, $body, $data_arr);
                if ($resp->original['status'] == '500') {
                    $notifications->update(['error' => $resp->original]);
                    $flag = false;
                }
            }
            if (!$flag) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function sendCircleAmountNotificationToAll()
    {
        try {
            $title = "Check the Circle Amount";
            $circles = Circles::where('deleted_at', null)->withCount(['group_members' => function (QueryBuilder $query) {
                $query->where('verified', '1');
            }])->with(['group_members' => ['user']])->get();
            Log::error($circles);
            foreach ($circles as $circle) {
                $total_circle_amount = (int)$circle->circle_amount * (int)$circle->group_members_count;
                $body = "$circle->circle_name total amount is $total_circle_amount";
                foreach ($circle->group_members as $member) {
                    if ($member->user != null) {
                        $firebase_token = $member->user->firebase_token;
                        $data_arr = ['notification_type' => '8', 'circle_type' => "" . $circle->circle_type, 'circle_id' => "" . $circle->id, 'circle_name' => "" . $circle->circle_name];
                        $notifications = Notifications::create(['from_user' => "0", 'to_user' => $member->user->id, 'title' => $title, 'body' => $body, 'read_at' => null, 'icon' => 1]);
                        $resp = $this->send_message($firebase_token, $title, $body, $data_arr);
                        if ($resp->original['status'] == '500') {
                            $notifications->update(['error' => $resp->original]);
                            $flag = false;
                        }
                    }
                }
                // Log::error($circle->group_members);
                // if ($circle->group_members->user == null) {
                //     continue;
                // }
                // $circle_name = $circle->circle_name;
            }
            if (!$flag) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function sendFridayDrawNumberAnnouncementNotification()
    {
        try {
            $users = User::where('deleted_at', null)->get();
            $title = "Draw Numbers Announced!";
            $body = "Please Check Your Email to know the results";
            foreach ($users as $user) {
                $firebase_token = $user->firebase_token;
                $data_arr = ['notification_type' => '9', 'user_id' => "" . $user->id, 'username' => $user->username];
                $notifications = Notifications::create(['from_user' => "0", 'to_user' => $user->id, 'title' => $title, 'body' => $body, 'read_at' => null, 'icon' => 1]);
                $resp = $this->send_message($firebase_token, $title, $body, $data_arr);
                if ($resp->original['status'] == '500') {
                    $notifications->update(['error' => $resp->original]);
                    $flag = false;
                }
            }
            if (!$flag) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function DrawOpenNotificationToAllTheUser()
    {
        try {
            $users = User::where('deleted_at', null)->get();
            $title = "Draw Number Opens Now!";
            $body = "You Can again Add the Circle, Join The Circle and Purchase the numbers!";
            foreach ($users as $user) {
                $firebase_token = $user->firebase_token;
                $data_arr = ['notification_type' => '10', 'user_id' => "" . $user->id, 'username' => $user->username];
                $notifications = Notifications::create(['from_user' => "0", 'to_user' => $user->id, 'title' => $title, 'body' => $body, 'read_at' => null, 'icon' => 1]);
                $resp = $this->send_message($firebase_token, $title, $body, $data_arr);
                if ($resp->original['status'] == '500') {
                    $notifications->update(['error' => $resp->original]);
                    $flag = false;
                }
            }
            if (!$flag) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    public function ThursdayTimePressureNotificationToAll()
    {
        try {
            $users = User::where('deleted_at', null)->get();
            $title = "Friday Comes Near";
            $body = "Purchase as much as ticket as you can to have higher probability of winning.";
            foreach ($users as $user) {
                $firebase_token = $user->firebase_token;
                $data_arr = ['notification_type' => '11', 'user_id' => "" . $user->id, 'username' => $user->username];
                $notifications = Notifications::create(['from_user' => "0", 'to_user' => $user->id, 'title' => $title, 'body' => $body, 'read_at' => null, 'icon' => 1]);
                $resp = $this->send_message($firebase_token, $title, $body, $data_arr);
                if ($resp->original['status'] == '500') {
                    $notifications->update(['error' => $resp->original]);
                    $flag = false;
                }
            }
            if (!$flag) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }
}
