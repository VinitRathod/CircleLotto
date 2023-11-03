<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CircleRequest;
use App\Models\Circles;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CircleController extends Controller
{
    //

    // public function create_circle(CircleRequest $request){
    //     // dd("Hello");
    //     // dd($request->toArray());
    //     try{ 
    //         $user = User::find(Auth::id());
    //         if(Circles::where("user_id",$user->id)->exists()){
    //             return $this->httpResponse(200,200,"You are not allowed to create any more circles.");
    //         }
    //         $circle = $user->circle()->create($request->all());
    //         return $this->httpResponse(200,200,"Circle Created Successfully", $circle);
    //     }catch(Exception $e){
    //         Log ::error("".$e->getMessage());
    //         return $this->httpResponse(500,500,"Some Error Occured! Please Try Again Later");
    //     }
    // }

    public function create_circle(User $user,$name,$type){
        // dd("Hello");
        // dd($request->toArray());
        try{ 
            // $user = User::find(Auth::id());
            if(Circles::where("user_id",$user->id)->exists()){
                return $this->httpResponse(200,200,"You are not allowed to create any more circles.");
            }
            $circle = $user->circle()->create(['circle_name'=> $name,'circle_type'=> $type]);
            // return $this->httpResponse(200,200,"Circle Created Successfully", $circle);
            return $circle;
        }catch(Exception $e){
            Log ::error("".$e->getMessage());
            return $this->httpResponse(500,500,"Some Error Occured! Please Try Again Later");
        }
    }
}
