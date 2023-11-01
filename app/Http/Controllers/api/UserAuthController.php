<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    //
    public function user_register(RegisterRequest $request)
    {
        // dd("Hello");
        try{
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);

            $user = User::create($data);

            $token = $this->accessTokenGenerater($user);

            $user->token = $token;

            return $this->httpResponse(200,200,"User Registered Successfully",$user);
            // return response()->json(["status"=>200,'result'=>$user],200);

        }catch(Exception $e){
            Log::error($e->getMessage());
            // return response()->json(['status'=> 500,'message'=> $e->getMessage()],500);
            return $this->httpResponse(500,500,"Some Error Occured! Please Try Again Later");
        }

    }

    public function login(){
        dd("Hello");
    }
}
