<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Mail\OTPEmail;
use App\Models\OTP;
use App\Models\User;
use App\Models\UserDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{
    //
    public function user_register(RegisterRequest $request)
    {
        // dd("Hello");
        try {
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['username'] = $request->username;
            $data['title'] = $request->title;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);
            // dd($request->firebase_token);
            $data['firebase_token'] = $request->firebase_token;

            $user = User::create($data);

            if ($user) {
                $req_data = ['dob' => $request->dob, 'phone' => $request->phone, 'post_code' => $request->post_code, 'security_question' => $request->security_question, 'security_answer' => $request->security_answer, 'receive_emails_notification' => $request->emails_noti];
                $user_det = UserDetails::insert($user, $req_data);
                if ($user_det == false) {
                    return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
                }
            }
            // OTP LOGIC START
            $randomNumber = random_int(1000, 9999);
            $otp = OTP::create(['user_id' => $user->id, 'expiry_at' => now()->addMinutes(5), 'code' => $randomNumber]);
            if ($otp->id) {
                try {
                    Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
                    Mail::to($user->email)->send(new OTPEmail($otp));
                    return $this->httpResponse(200, 200, "OTP Email Shared! Please Check Email To Conitnue", ['user_id' => $user->id]);
                } catch (Exception $e) {
                    Log::error($e);
                    return $this->httpResponse(500, 500, "" . $e->getMessage());
                }
            }
            // OTP LOGIC END
            $token = $this->accessTokenGenerater($user);

            $user->token = $token;

            $userResource = new RegisterResource($user);

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

            return $this->httpResponse(200, 200, "User Registered Successfully", $userResource);
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
        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'firebase_token' => ['required'],
        ]);
        try {
            // $data = $request->all();
            // $user = User::where('email',$request->email)->first();
            // dd($user);
            // dd(Auth::attempt(['email'=>$request->email,'password'=>$request->password]));
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                User::where('id', Auth::id())->update(['firebase_token' => $validated['firebase_token']]);
                $user = User::find(Auth::id());
                // OTP LOGIC START
                $randomNumber = random_int(1000, 9999);
                if (OTP::where('user_id', $user->id)->exists()) {
                    OTP::where('user_id', $user->id)->delete();
                }
                $otp = OTP::create(['user_id' => $user->id, 'expiry_at' => now()->addMinutes(5), 'code' => $randomNumber]);
                if ($otp->id) {
                    try {
                        // Auth::attempt(['email' => $user->email, 'password' => $request->password]);
                        Mail::to($user->email)->send(new OTPEmail($otp));
                        return $this->httpResponse(200, 200, "OTP Email Shared! Please Check Email To Conitnue", ['user_id' => $user->id]);
                    } catch (Exception $e) {
                        Log::error($e);
                        return $this->httpResponse(500, 500, "" . $e->getMessage());
                    }
                }
                // OTP LOGIC END                
                // if ($user->email_verified_at != null) {
                $token = $this->accessTokenGenerater($user);
                $user->token = $token;
                $userResource = new LoginResource($user);
                return $this->httpResponse(200, 200, "Login Successful", $userResource);
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

    public function verify_otp(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|max:4',
            'user_id' => 'required'
        ]);
        try {
            // dd($validated['user_id'], $validated['code']);
            $user_id = $validated['user_id'];
            $code = $validated['code'];
            $otp = OTP::where('user_id', $user_id)->where('code', $code);
            if ($otp->exists()) {
                $otpObj = $otp->first();
                // now() <= $otp->expiry_at
                if (now() <= $otpObj->expiry_at) {
                    OTP::where('id', $otpObj->id)->delete();
                    $user = User::where('id', $user_id)->first();
                    $token = $this->accessTokenGenerater($user);
                    $user->token = $token;
                    $userRes = new LoginResource($user);
                    return $this->httpResponse(200, 200, "User Verified!", $userRes);
                } else {
                    return $this->httpResponse(500, 500, "OTP Expired! Please Resend it.");
                }
            } else {
                return $this->httpResponse(500, 500, "No OTP Exists Please Resend it.");
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, '' . $e->getMessage());
        }
    }

    public function resend_otp(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
        ]);
        try {
            $user_id = $validated['user_id'];
            $otp = OTP::where('user_id', $user_id)->with(['user']);


            if ($otp->exists()) {
                $randomNumber = random_int(1000, 9999);
                // $otpObj = $otp->first();
                // dd($otpObj->user->email);
                $otp->update(['code' => $randomNumber, 'expiry_at' => now()->addMinutes(5)]);
                $otpObj = OTP::where('user_id', $user_id)->first();
                Mail::to($otpObj->user->email)->send(new OTPEmail($otpObj));
                return $this->httpResponse(200, 200, "OTP Shared! Please Check Your Email");
            } else {
                return $this->httpResponse(500, 500, "No User Found! Please Login again to Continue");
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }
}
