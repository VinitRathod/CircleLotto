<?php

namespace App\Http\Controllers;

use App\Models\Circles;
use App\Models\Notifications;
use App\Models\User;
use Exception;
use Google_Client;
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
            $circles = Circles::withCount(['group_members'])->with(['user'])->get();
            Log::error($circles);
            foreach ($circles as $value) {
                if ($value->group_members_count <= 1) {
                    $data_arr = ['notification_type' => '6', 'circle_type' => "" . $value->circle_type, 'circle_id' => "" . $value->id, 'circle_name' => "" . $value->circle_name];
                    $notifications = Notifications::create(['from_user' => "0", 'to_user' => $value->user->id, 'title' => $title, 'body' => $body, 'read_at' => null]);
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
}
