<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function httpResponse($status, $intResponseCode, $message, $data='')
    {
        $result = array();

        $result['status'] = $status;
        $result['message'] = $message == null ? 'success' : $message;

        if(!empty($data)){
            $result['result'] = $data;
        }

        return response()->json($result, $intResponseCode);
    }

    public function accessTokenGenerater($user)
    {
        // DB::table('oauth_access_tokens')->where('user_id', '=', $user->id)->delete();
        $token = $user->createToken('Circle Lotto Login')->accessToken;
        return $token;
    }
}
