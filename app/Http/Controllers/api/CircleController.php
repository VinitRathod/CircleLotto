<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CircleRequest;
use App\Http\Resources\UserResource;
use App\Models\Circles;
use App\Models\DrawNumbers;
use App\Models\SavedNumbers;
use App\Models\User;
use App\Models\UserDetails;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
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

    public function create_circle(User $user, $name, $type)
    {
        // dd("Hello");
        // dd($request->toArray());
        try {
            // $user = User::find(Auth::id());
            if (Circles::where("user_id", $user->id)->exists()) {
                return $this->httpResponse(200, 200, "You are not allowed to create any more circles.");
            }
            $circle = $user->circle()->create(['circle_name' => $name, 'circle_type' => $type]);
            // return $this->httpResponse(200,200,"Circle Created Successfully", $circle);
            return $circle;
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }

    public function luckyDip()
    {
        $num = array();
        for ($i = 0; $i < 7; $i++) {
            if ($i == 5 || $i == 6) {
                $num[] = rand(1, 12);
                continue;
            }
            $num[] = rand(1, 50);
        }
        return $this->httpResponse(200, 200, "Numbers Generated", ['luckyDip' => $num]);
        // dd($num);
    }

    public function addNewNumbers(Request $request)
    {
        try {
            $validated = $request->validate([
                'circle_id' => 'required|exists:App\Models\Circles,id',
                'numbers' => 'required|array'
            ]);
            // dd($request->numbers);
            $user = User::where('id', Auth::id())->first();
            // $data = ['circle_id' => $request->circle_id, 'numbers' => $request->numbers, 'user_id' => Auth::id()];
            // $new_number = DrawNumbers::create($data);
            $new_number = $user->draw_numbers()->create($request->all());
            $saved_number = $user->saved_numbers()->create(['numbers' => $request->numbers]);
            return $this->httpResponse(200, 200, "Numbers Added Successfully", ['numbers' => $new_number->numbers]);
            // dd($new_number);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }

    public function savedNumbersList()
    {
        try {
            $numbers = User::with(['saved_numbers'])->where('id', Auth::id())->get();
            JsonResource::withoutWrapping();
            // dd();
            return $this->httpResponse(200, 200, "Saved Numbers List", UserResource::collection($numbers)->response()->getData(true));
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }

    public function editSavedNumbers(Request $request, $id)
    {
        try {
            $number = SavedNumbers::where('id', $id)->update(['numbers' => $request->numbers]);
            return $this->httpResponse(200, 200, "Numbers Updated Successfully");
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        } catch (QueryException $error) {
            Log::error("" . $error->getMessage());
            return $this->httpResponse(500, 500, "Somer Error Occured While Updating the database");
        }
    }

    public function deleteSavedNumbers($id)
    {
        try {
            $number = SavedNumbers::where('id', $id)->delete();
            return $this->httpResponse(200, 200, "Number Deleted Successfully");
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }

    public function joinCirlce(Request $request)
    {
        try {
            if (UserDetails::where('phone', $request->phone)->exists()) {
                // dd();
                $data = UserDetails::where('phone', $request->phone)->with(['user' => [
                    'circle' => function (Builder $query) use ($request) {
                        $query->where('circle_name', $request->circle_name)->where('circle_type', 2);
                    }
                ]])->first();
                if ($data->user->circle != null) {
                    $result = [
                        'user_id' => $data->user_id,
                        'phone' => $data->phone,
                        'circle_id' => $data->user->circle->id,
                        'circle_name' => $data->user->circle->circle_name
                    ];
                    return $this->httpResponse(200, 200, "Circle Found", $result);
                } else {
                    return $this->httpResponse(200, 200, "No Circle Found");
                }
            } else {
                return $this->httpResponse(200, 200, "No Circle Found");
            }
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }
}
