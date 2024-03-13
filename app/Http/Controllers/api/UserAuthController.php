<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Models\UserDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    //
    public function user_register(RegisterRequest $request)
    {
        // dd("Hello");
        try {
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['title'] = $request->title;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);
            $data['firebase_token'] = $request->firebase_token;

            $user = User::create($data);

            if ($user) {
                $req_data = ['dob' => $request->dob, 'phone' => $request->phone, 'post_code' => $request->post_code, 'security_question' => $request->security_question, 'security_answer' => $request->security_answer, 'receive_emails_notification' => $request->emails_noti];
                $user_det = UserDetails::insert($user, $req_data);
                if ($user_det == false) {
                    return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
                }
            }
            $token = $this->accessTokenGenerater($user);

            $user->token = $token;

            // if ((isset($request->circle_name) && $request->circle_name != null)) {
            //     // $new_circle = null;
            //     // dd("Hello");
            //     try {
            //         $circle = new CircleController();
            //         $new_circle = $circle->create_circle($user, $request->circle_name, $request->circle_type);
            //         if ($new_circle['status'] == 400) {
            //             return $this->httpResponse($new_circle['status'], 200, $new_circle['message']);
            //         }
            //         // dd($new_circle);
            //     } catch (Exception $e) {
            //         Log::error("" . $e->getMessage());
            //         return $this->httpResponse(500, 500, "Some Error Occured While Creating Circle! Please Try Again Later");
            //     }
            // }


            // dd($new_circle);

            return $this->httpResponse(200, 200, "User Registered Successfully", $user);
            // return response()->json(["status"=>200,'result'=>$user],200);

        } catch (Exception $e) {


            Log::error($e);
            // return response()->json(['status'=> 500,'message'=> $e->getMessage()],500);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        // dd("Hello");
        // dd($request->all());
        try {
            // $data = $request->all();
            // $user = User::where('email',$request->email)->first();
            // dd($user);
            // dd(Auth::attempt(['email'=>$request->email,'password'=>$request->password]));
            if (Auth::attempt($request->all())) {
                $user = Auth::user();
                // if ($user->email_verified_at != null) {
                $token = $this->accessTokenGenerater($user);
                $user->token = $token;
                return $this->httpResponse(200, 200, "Login Successful", $user);
                // } else {
                // dd($request);
                // $token = $request->user()->token();
                // // dd($request->user()->token());
                // // dd($token->revoke());
                // $token->revoke();
                // dd(Auth::user());
                // Auth::logout();
                // return $this->httpResponse(200, 200, "Please Verify Your Account First!");
                // dd($user);
                // }
            } else {
                return $this->httpResponse(500, 500, "Login Failed! Invalid Email or Password");
            }

            // dd(Auth::id());
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->httpResponse(500, 500, "Login Failed! Please Try Again Later");
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        // dd($request->user()->token());
        // dd($token->revoke());
        $token->revoke();
        // Auth::logout();
        return $this->httpResponse(200, 200, "User Logged Out");
    }
}
