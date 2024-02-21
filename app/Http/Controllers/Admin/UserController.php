<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
}
