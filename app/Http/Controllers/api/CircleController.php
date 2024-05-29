<?php

namespace App\Http\Controllers\api;

use App\Events\StartCircle;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FirebaseController;
use App\Http\Requests\CircleRequest;
use App\Http\Resources\AdminMessageResource;
use App\Http\Resources\CircleResource;
use App\Http\Resources\GroupMemberResource;
use App\Http\Resources\MyCircleResource;
use App\Http\Resources\MyNumbersResource;
use App\Http\Resources\NotificationsResource;
use App\Http\Resources\SavedNumbersResource;
use App\Http\Resources\SearchCircleResource;
use App\Http\Resources\UserResource;
use App\Models\AdminMessages;
use App\Models\Circles;
use App\Models\DrawNumbers;
use App\Models\GroupMembers;
use App\Models\Notifications;
use App\Models\SavedNumbers;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserRequest;
use App\Models\Winners;
use App\Models\WinningNumber;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

    // public function create_circle(User $user, $name, $type)
    public function create_circle(Request $request)
    {
        // dd("Hello");
        // dd($request->toArray());
        $validated = $request->validate([
            'circle_name' => 'required',
            'circle_type' => 'required',
            'circle_amount' => 'required|integer'
        ]);
        try {
            $user = User::where('id', Auth::id())->first();
            $name = $request->circle_name;
            $type = $request->circle_type;
            $amount = $request->circle_amount;
            // $user = User::find(Auth::id());
            if (Circles::where("user_id", $user->id)->where('deleted_at', null)->exists()) {
                // return ['status' => 400, 'message' => "You are not allowed to create any more circles."];
                return $this->httpResponse(200, 200, "You are not allowed to create any more circles.");
            }
            if (Circles::where("circle_name", $name)->where('deleted_at', null)->exists()) {
                // return ['status' => 400, 'message' => "Circle With These Name Already Exists."];
                return $this->httpResponse(200, 200, "Circle With These Name Already Exists.");
            }
            $circle = $user->circle()->create(['circle_name' => $name, 'circle_type' => $type, 'circle_amount' => $amount]);
            // dd($circle);
            GroupMembers::create(['circle_id' => $circle->id, 'user_id' => $user->id, 'verified' => 1]);
            if ($type == '2') {
                StartCircle::dispatch($circle);
                // $notifications = $this->sendNotificationToAll("Public Group Added", "$name is Added", $circle);
                // if ($notifications->original['status'] == '500') {
                //     Log::error($notifications->original);
                // }
            }
            $circleResource = new CircleResource($circle);
            return $this->httpResponse(200, 200, "Circle Created Successfully", $circleResource);
            // return ['status' => 200, 'message' => "Circle Create", 'result' => $circle];
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }




    public function luckyDip()
    {
        $num = array();
        // for ($i = 0; $i < 7; $i++) {
        //     if ($i == 5 || $i == 6) {
        //         $num[] = rand(1, 12);
        //         continue;
        //     }
        //     // shu
        //     $num[] = rand(1, 50);
        //     // if()
        // }

        $numbers = range(1, 50);
        shuffle($numbers);
        $numbers_five = array_slice($numbers, 0, 5);

        $temp = range(1, 12);
        shuffle($temp);
        $numbers_two = array_slice($temp, 0, 2);

        $numbers = array_merge($numbers_five, $numbers_two);


        // dd($numbers);
        return $this->httpResponse(200, 200, "Numbers Generated", ['luckyDip' => $numbers]);
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
            if ($request->saved_number == '0') {
                if (DrawNumbers::where('user_id', Auth::id())->where(function (Builder $query) use ($request) {
                    $query->whereJsonContains('numbers', $request->numbers);
                })->exists() || SavedNumbers::where('user_id', Auth::id())->where(function (Builder $query) use ($request) {
                    $query->whereJsonContains('numbers', $request->numbers);
                })->exists()) {
                    return $this->httpResponse(200, 200, "You are not allowed to Enter the Same Sequence of the Numbers");
                }
            } else {
                if (DrawNumbers::where('user_id', Auth::id())->where(function (Builder $query) use ($request) {
                    $query->whereJsonContains('numbers', $request->numbers);
                })->exists()) {
                    return $this->httpResponse(200, 200, "You are not allowed to Enter the Same Sequence of the Numbers");
                }
            }
            $new_number = $user->draw_numbers()->create(['circle_id' => $request->circle_id, 'numbers' => $request->numbers]);
            $saved_number = $user->saved_numbers()->create(['numbers' => $request->numbers]);
            return $this->httpResponse(200, 200, "Numbers Added Successfully", ['numbers' => $new_number->numbers]);
            // dd($new_number);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }

    public function addSavedNumbers(Request $request)
    {
        $validated = $request->validate([
            'numbers' => 'required|array'
        ]);
        try {
            // dd($validated);
            $user = User::where('id', Auth::id())->first();
            $saved_number = $user->saved_numbers()->create($validated);
            return $this->httpResponse(200, 200, "Numbers Saved Successfully");
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }

    public function savedNumbersList()
    {
        try {
            $numbers = User::with(['saved_numbers'])->where('id', Auth::id())->first();
            JsonResource::withoutWrapping();
            // dd(new UserResource($numbers));
            return $this->httpResponse(200, 200, "Saved Numbers List", new UserResource($numbers));
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, $e->getMessage());
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

    public function searchCircle(Request $request)
    {
        try {
            SearchCircleResource::withoutWrapping();
            // dd(UserDetails::where('phone', $request->phone)->exists());
            // $userDet = new UserDetails();
            $circles = User::leftJoin('tbl_user_details', 'tbl_user_details.user_id', '=', 'users.id')
                ->rightJoin('tbl_circles', 'tbl_circles.user_id', '=', 'users.id');
            $circles->where('tbl_circles.deleted_at', null);
            $circles->where('users.deleted_at', null);
            if (!empty($request->phone)) {
                $circles->where('phone', $request->phone);
            }

            if (!empty($request->circle_name)) {
                $circles->where('circle_name', $request->circle_name);
            }

            if (!empty($request->circle_type)) {
                $circles->where('circle_type', $request->circle_type);
            }
            $data = $circles->get();

            // dd($data);

            if (count($data) > 0) {
                $circle_arr = array();

                foreach ($data as $value) {
                    $circle = Circles::where('user_id', $value->user_id)->where('deleted_at', null)->with(['group_members' => function (Builder $query) {
                        $query->where('verified', 1);
                    },])->withCount(['group_members' => function (Builder $query) {
                        $query->where('verified', 1);
                    }, 'draw_numbers'])->first();
                    $total_circle_amount = (int)$circle->draw_numbers_count * (int)$circle->circle_amount;
                    // unset($circle->draw_numbers_count);
                    $circle->total_circle_amount = $total_circle_amount;
                    // $circleMembersCount = GroupMembers::where(['circle_id' => $circle->id, 'verified' => 1])->count();
                    // $total_circle_amount = DrawNumbers::where('circle_id',$circle)
                    // $circle['total_circle_users'] = $circleMembersCount;
                    $circle_arr[] = $circle;
                    // dd($circle_arr);
                }
                $searchCircleRes = SearchCircleResource::collection($circle_arr)->response()->getData(true);
                // return $this->httpResponse(200, 200, "Circle Found", $circle_arr);
                return $this->httpResponse(200, 200, "Circle Found", $searchCircleRes);
            } else {
                return $this->httpResponse(200, 200, "No Circle Found");
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }

    public function joinCircle(Request $request)
    {
        try {
            $validated = $request->validate([
                'circle_id' => 'required',
                'circle_type' => 'required'
            ]);
            $user_id = Auth::id();
            if (GroupMembers::where(['circle_id' => $request->circle_id, 'user_id' => $user_id])->exists()) {
                return $this->httpResponse(200, 200, "You Are Already A Member of this Group");
            } else {
                if ($request->circle_type == 1) {
                    $user = User::find(Auth::id());
                    $notifications = $this->sendNotificationsToGroupAdmin($validated['circle_id'], "New Member Joined", "$user->first_name $user->last_name Joined the Group! Please Verify to continue");
                    // if($notifications->original['status'] == '500'){
                    // }

                    GroupMembers::create(['circle_id' => $request->circle_id, 'user_id' => $user_id, 'verified' => 0]);
                    return $this->httpResponse(200, 200, "Circle Joining Request Submitted");
                } else {
                    GroupMembers::create(['circle_id' => $request->circle_id, 'user_id' => $user_id, 'verified' => 1]);

                    // Send notification when a user has joined in the group
                    $notifications = $this->sendNotificationtoGroupMembers($validated['circle_id'], $user_id, '5');
                    return $this->httpResponse(200, 200, "You're Added to the Circle");
                }
            }
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            // return response()->json(['']);
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }

    public function start_circle(Request $request)
    {
        try {
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
        }
    }

    // public function drawWinner()
    // {
    //     try {
    //         $winningDraw = [21, 44, 46, 21, 33, 2, 11];
    //         // $circles = Circles::with(['draw_numbers'])->get()->toArray();
    //         // dd($circles);
    //         $circles = Circles::select(['id'])->get()->toArray();
    //         // $circles->dd();

    //         // $winning_user = DrawNumbers::whereJsonContains('numbers', $winningDraw)->with('circle')->get()->toArray();
    //         $circles_id = array();
    //         foreach ($circles as $circle) {
    //             $circles_id[] = $circle['id'];
    //         }
    //         // dd($circles_id);
    //         $win_user_id = array();

    //         // echo "<pre>";
    //         // print_r($circles_id);
    //         // 
    //         // dd($star_freq["0.25"]);
    //         $circle_count = count($circles_id);

    //         for ($i = 0; $i <= 25; $i++) {
    //             // $temp = 1;
    //             if (empty($circles_id)) {
    //                 break;
    //             }
    //             $winningDraw = [21, 44, 46, 21, 33, 2, 11];

    //             // $winningDraw = [20, 43, 45, 20, 32, 1, 10];
    //             if ($i == 0) {

    //                 $winningDraw = [$winningDraw[0], $winningDraw[1], $winningDraw[2], $winningDraw[3], $winningDraw[4], $winningDraw[5], $winningDraw[6]];
    //             } else {
    //                 // $star_var = (2*($temp-1) + 1) == $i ? $temp++ : $temp;
    //                 $winningDraw1 = [$winningDraw[0] + $i, $winningDraw[1] + $i, $winningDraw[2] + $i, $winningDraw[3] + $i, $winningDraw[4] + $i, $winningDraw[5] + (int)ceil($i / 2), $winningDraw[6] + (int)ceil($i / 2)];
    //                 $winningDraw2 = [$winningDraw[0] - $i, $winningDraw[1] - $i, $winningDraw[2] - $i, $winningDraw[3] - $i, $winningDraw[4] - $i, $winningDraw[5] - (int)ceil($i / 2), $winningDraw[6] - (int)ceil($i / 2)];
    //                 // if ($i == 2) {
    //                 //     dd($winningDraw);
    //                 // }
    //                 // dd($winningDraw);
    //             }
    //             // dd($winningDraw);

    //             $circles = Circles::whereIn('id', $circles_id)->with(['draw_numbers' => function (Builder $query) use ($winningDraw) {
    //                 $query->whereJsonContains('numbers', $winningDraw);
    //             }])->get();
    //             // $circles->dd();
    //             // dd($circles);
    //             // if()
    //             foreach ($circles as $circle_key => $circle) {
    //                 // echo "<pre>";
    //                 // print_r($circle->circle_name);
    //                 // echo "\n";
    //                 // echo "</pre>";
    //                 if (count($circle->draw_numbers) == 1) {
    //                     $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $circle->draw_numbers[0]->user_id];
    //                     $key = array_search($circle->id, $circles_id);
    //                     if ($key != false || $key == 0) {
    //                         unset($circles_id[$key]);
    //                     }
    //                 }
    //                 // dd($win_user_id);
    //                 else if (count($circle->draw_numbers) > 1) {
    //                     $circleVar = Circles::where('id', $circle->id)->with(['draw_numbers' => function (Builder $query) use ($winningDraw) {
    //                         $query->whereJsonContains('numbers', $winningDraw)->latest()->first();
    //                     }])->first();
    //                     // dd($circleVar);
    //                     $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $circleVar->draw_numbers[0]->user_id];
    //                     $key = array_search($circle->id, $circles_id);
    //                     if ($key != false || $key == 0) {
    //                         unset($circles_id[$key]);
    //                     }
    //                 } else if (count($circle->draw_numbers) == 0) {
    //                     // $circles_id[] = $circle->id;
    //                     // if ($i != 0) {
    //                     //     $temp_arr = [$winningDraw[0] - $i, $winningDraw[1] - $i, $winningDraw[2] - $i, $winningDraw[3] - $i, $winningDraw[4] - $i, $winningDraw[5] - (int)ceil($i / 2), $winningDraw[6] - (int)ceil($i / 2)];
    //                     //     if (DrawNumbers::where('circle_id', $circle->id)->whereJsonContains('numbers', $temp_arr)->exists()) {
    //                     //         // dd("Hello");
    //                     //         $numbers = DrawNumbers::where('circle_id', $circle->id)->whereJsonContains('numbers', $temp_arr)->get();
    //                     //         dd($numbers);
    //                     //     }
    //                     // }
    //                     $circleVar = Circles::where('id', $circle->id)->with(['draw_numbers'])->first();
    //                     $draw_numebrs = $circleVar->draw_numbers;
    //                     $main_arr = array();
    //                     $star_arr = array();

    //                     $draw_number_selected = false;
    //                     $j = 0;
    //                     for ($j = 0; $j < 12; $j++) {
    //                         foreach ($draw_numebrs as $value) {
    //                             $main_arr = array_slice($value->numbers, 0, 5);
    //                             $star_arr = array_slice($value->numbers, 5);
    //                             $main_diff = 5 - count(array_diff(array_slice($winningDraw, 0, 5), $main_arr));
    //                             $star_diff = 2 - count(array_diff(array_slice($winningDraw, 5), $star_arr));

    //                             // if ($key == 1) {
    //                             //     dd($main_arr, $main_diff, $star_diff);
    //                             // }
    //                             // echo "<pre>";
    //                             // print_r("Main Diff" . $main_diff);

    //                             // print_r("Star Diff" . $star_diff);
    //                             // echo "\n";
    //                             // echo "</pre>";

    //                             if ($j == 0 && $main_diff == 5 && $star_diff == 1) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];

    //                                 $key = array_search($circleVar->id, $circles_id);


    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 1 && $main_diff == 5 && $star_diff == 0) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);

    //                                 // if ($circle_key == 1) {
    //                                 // }


    //                                 // dd($circles_id);
    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                     // dd("Hello");
    //                                     // dd($circles_id);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 2 && $main_diff == 4 && $star_diff == 2) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 3 && $main_diff == 4 && $star_diff == 1) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 4 && $main_diff == 3 && $star_diff == 2) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 5 && $main_diff == 4 && $star_diff == 0) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 6 && $main_diff == 2 && $star_diff == 2) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 7 && $main_diff == 3 && $star_diff == 1) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 8 && $main_diff == 3 && $star_diff == 0) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 9 && $main_diff == 1 && $star_diff == 2) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 10 && $main_diff == 2 && $star_diff == 1) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             } else if ($j == 11 && $main_diff == 2 && $star_diff == 0) {
    //                                 $win_user_id[] = ['circle_id' => $circleVar->id, 'user_id' => $value->user_id];
    //                                 $key = array_search($circleVar->id, $circles_id);



    //                                 if ($key != false || $key == 0) {
    //                                     unset($circles_id[$key]);
    //                                 }
    //                                 $draw_number_selected = true;
    //                                 break;
    //                             }
    //                         }
    //                         if ($draw_number_selected) {
    //                             break;
    //                         }
    //                     }
    //                     // Write Other conditional Logics here

    //                     // $win_user_id[] = ['circle_id' => $circle->id];
    //                 }
    //             }
    //         }
    //         dd($win_user_id);
    //     } catch (Exception $e) {
    //         Log::error("" . $e->getMessage());
    //         return $this->httpResponse(500, 500, "Some Error Occured! Please Try Again Later");
    //     }
    // }

    public function drawWinner(Request $request)
    {
        $validated = $request->validate([
            'drawNumber' => 'required|array',
            // 'body' => 'required',
        ]);
        try {
            $winningDraw = $request->drawNumber;

            WinningNumber::where('id', '!=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
            $winningNumber = WinningNumber::create(['winning_number' => $winningDraw]);

            // $circles = Circles::with(['draw_numbers'])->get()->toArray();
            // dd($circles);
            $circles = Circles::select(['id'])->get()->toArray();
            // $circles->dd();

            // $winning_user = DrawNumbers::whereJsonContains('numbers', $winningDraw)->with('circle')->get()->toArray();
            $circles_id = array();
            foreach ($circles as $circle) {
                $circles_id[] = $circle['id'];
            }
            // dd($circles_id);
            $win_user_id = array();

            // echo "<pre>";
            // print_r($circles_id);
            // 
            // dd($star_freq["0.25"]);
            $circle_count = count($circles_id);

            for ($i = 0; $i <= 24; $i++) {
                // $temp = 1;
                if (empty($circles_id)) {
                    break;
                }
                // $winningDraw = [21, 44, 46, 21, 33, 2, 11];

                // $winningDraw = [20, 43, 45, 20, 32, 1, 10];
                // if ($i == 0) {

                //     $winningDraw = [
                //         $winningDraw[0], $winningDraw[1], $winningDraw[2], $winningDraw[3], $winningDraw[4], $winningDraw[5], $winningDraw[6]
                //     ];
                // } else {
                // $star_var = (2*($temp-1) + 1) == $i ? $temp++ : $temp;
                // $winningDraw1 = [$winningDraw[0] + $i, $winningDraw[1] + $i, $winningDraw[2] + $i, $winningDraw[3] + $i, $winningDraw[4] + $i, $winningDraw[5] + (int)ceil($i / 2), $winningDraw[6] + (int)ceil($i / 2)];
                // $winningDraw2 = [$winningDraw[0] - $i, $winningDraw[1] - $i, $winningDraw[2] - $i, $winningDraw[3] - $i, $winningDraw[4] - $i, $winningDraw[5] - (int)ceil($i / 2), $winningDraw[6] - (int)ceil($i / 2)];
                // if ($i == 2) {
                //     dd($winningDraw);
                // }
                // dd($winningDraw);
                // }
                // dd($winningDraw);

                $circles = Circles::whereIn('id', $circles_id)->with(['draw_numbers'])->get();
                // $circles->dd();
                // dd($circles);
                // if()
                foreach ($circles as $circle_key => $circle) {

                    // $circleVar = Circles::where('id', $circle->id)->with(['draw_numbers'])->first();
                    $draw_numebers = $circle->draw_numbers;
                    // dd($draw_numebrs);
                    $main_arr = array();
                    $star_arr = array();

                    $draw_number_selected = false;
                    $j = 0;
                    for ($j = 0; $j < 13; $j++) {
                        foreach ($draw_numebers as $value) {
                            // dd($value->numbers);
                            $main_arr = array_slice($value->numbers, 0, 5);
                            $star_arr = array_slice($value->numbers, 5);
                            $main_arr = [$main_arr[0] + $i, $main_arr[1] + $i, $main_arr[2] + $i, $main_arr[3] + $i, $main_arr[4] + $i];
                            $star_arr = [$star_arr[0] + (int)ceil($i / 2), $star_arr[1] + (int)ceil($i / 2)];
                            // dd($main_arr);
                            // $main_diff_plus = 5 - count(array_diff(array_slice($winningDraw1, 0, 5), $main_arr));
                            // $star_diff_plus = 2 - count(array_diff(array_slice($winningDraw1, 5), $star_arr));
                            $main_diff_plus = 5 - count(array_diff(array_slice($winningDraw, 0, 5), $main_arr));
                            $star_diff_plus = 2 - count(array_diff(array_slice($winningDraw, 5), $star_arr));

                            $main_arr = [$main_arr[0] - $i, $main_arr[1] - $i, $main_arr[2] - $i, $main_arr[3] - $i, $main_arr[4] - $i];
                            $star_arr = [$star_arr[0] - (int)ceil($i / 2), $star_arr[1] - (int)ceil($i / 2)];
                            // $main_diff_subtract = 5 - count(array_diff(array_slice($winningDraw2, 0, 5), $main_arr));
                            // $star_diff_subtract = 2 - count(array_diff(array_slice($winningDraw2, 5), $star_arr));
                            $main_diff_subtract = 5 - count(array_diff(array_slice($winningDraw, 0, 5), $main_arr));
                            $star_diff_subtract = 2 - count(array_diff(array_slice($winningDraw, 5), $star_arr));
                            // dd(array_slice($winningDraw1, 0, 5), $main_arr, array_diff(array_slice($winningDraw1, 0, 6), $main_arr), array_diff(array_slice($winningDraw1, 5), $star_arr), array_diff(array_slice($winningDraw2, 0, 5), $main_arr), array_diff(array_slice($winningDraw2, 5), $star_arr));

                            // if ($key == 1) {
                            //     dd($main_arr, $main_diff, $star_diff);
                            // }
                            // echo "<pre>";
                            // print_r("Main Diff" . $main_diff);

                            // print_r("Star Diff" . $star_diff);
                            // echo "\n";
                            // echo "</pre>";

                            if ($j == 0 && (($main_diff_plus == 5 && $star_diff_plus == 2) || ($main_diff_subtract == 5 && $star_diff_subtract == 2))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Fully"];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Fully"];

                                $key = array_search($circle->id, $circles_id);


                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 1 && (($main_diff_plus == 5 && $star_diff_plus == 1) || ($main_diff_subtract == 5 && $star_diff_subtract == 1))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];

                                $key = array_search($circle->id, $circles_id);


                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 2 && (($main_diff_plus == 5 && $star_diff_plus == 0) || ($main_diff_subtract == 5 && $star_diff_subtract == 0))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);

                                // if ($circle_key == 1) {
                                // }


                                // dd($circles_id);
                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                    // dd("Hello");
                                    // dd($circles_id);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 3 && (($main_diff_plus == 4 && $star_diff_plus == 2) || ($main_diff_subtract == 4 && $star_diff_subtract == 2))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 4 && (($main_diff_plus == 4 && $star_diff_plus == 1) || ($main_diff_subtract == 4 && $star_diff_subtract == 1))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 5 && (($main_diff_plus == 3 && $star_diff_plus == 2) || ($main_diff_subtract == 3 && $star_diff_subtract == 2))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 6 && (($main_diff_plus == 4 && $star_diff_plus == 0) || ($main_diff_subtract == 4 && $star_diff_subtract == 0))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 7 && (($main_diff_plus == 2 && $star_diff_plus == 2) || ($main_diff_subtract == 2 && $star_diff_subtract == 2))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 8 && (($main_diff_plus == 3 && $star_diff_plus == 1) || ($main_diff_subtract == 3 && $star_diff_subtract == 1))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 9 && (($main_diff_plus == 3 && $star_diff_plus == 0) || ($main_diff_subtract == 3 && $star_diff_subtract == 0))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 10 && (($main_diff_plus == 1 && $star_diff_plus == 2) || ($main_diff_subtract == 1 && $star_diff_subtract == 2))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 11 && (($main_diff_plus == 2 && $star_diff_plus == 1) || ($main_diff_subtract == 2 && $star_diff_subtract == 1))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            } else if ($j == 12 && (($main_diff_plus == 2 && $star_diff_plus == 0) || ($main_diff_subtract == 2 && $star_diff_subtract == 0))) {
                                // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                                // $win_user_id[] = ['circle_name' => $circle->circle_name, 'user_name' => User::where('id', $value->user_id)->first()->first_name, 'user_number' => $value->numbers];
                                $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers, 'status' => "Partially"];
                                $key = array_search($circle->id, $circles_id);



                                if ($key != false || $key == 0) {
                                    unset($circles_id[$key]);
                                }
                                $draw_number_selected = true;
                                break;
                            }
                            // else if ($j == 13 && (($main_diff_plus == 1 && $star_diff_plus == 0) || ($main_diff_subtract == 1 && $star_diff_subtract == 0))) {
                            //     // $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id];
                            //     $win_user_id[] = ['circle_id' => $circle->id, 'user_id' => $value->user_id, 'user_number' => $value->numbers];
                            //     $key = array_search($circle->id, $circles_id);



                            //     if ($key != false || $key == 0) {
                            //         unset($circles_id[$key]);
                            //     }
                            //     $draw_number_selected = true;
                            //     break;
                            // }
                        }
                        if ($draw_number_selected) {
                            break;
                        }
                    }
                }
            }
            // dd($win_user_id);
            // if (count($win_user_id) > 0) {

            //     Winners::insert($win_user_id);
            // }
            $winner = new Winners();
            $winner->where('id', '!=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
            // Winnersupdate();

            $winner = 1;
            foreach ($win_user_id as $value) {
                $notifications = $this->sendNotificationToASingleUser($value['user_id'], $value['circle_id']);
                $notification_2 = $this->sendNotificationtoGroupMembers($value['circle_id'], $value['user_id'], 4);
                $email = $this->sendEmailToWinner($value['user_id'], $value['circle_id'], $winner, $winningDraw);
                DrawNumbers::where('circle_id', $value['circle_id'])->where('user_id', '!=', $value['user_id'])->where('deleted_at', null)->update(['winner' => 2, 'winning_number_id' => $winningNumber->id]);
                DrawNumbers::where('circle_id', $value['circle_id'])->where('user_id', '=', $value['user_id'])->where('deleted_at', null)->whereJsonContains('numbers', $value['user_number'])->update(['winner' => 1, 'winning_number_id' => $winningNumber->id]);
                DrawNumbers::where('circle_id', $value['circle_id'])->where('user_id', '=', $value['user_id'])->where('deleted_at', null)->where('winner', '!=', 1)->update(['winner' => 2, 'winning_number_id' => $winningNumber->id]);
                $value['winning_number_id'] = $winningNumber->id;
                // if()
                Winners::create($value);
            }

            $fbNot = new FirebaseController();
            $fbNot->sendFridayDrawNumberAnnouncementNotification();

            $this->switchOnFunctionality();

            $fbNot->DrawOpenNotificationToAllTheUser();

            $circles = Circles::where('deleted_at', null)->get();
            $circleObj = new Circles();
            foreach ($circles as $circle) {
                $circleObj->deleteCircle($circle->id);
            }
            $winnerData = Winners::with(['circle', 'user'])->where('deleted_at', null)->get();
            // dd($winnerData);
            // dd($win_user_id);
            return $this->httpResponse(200, 200, count($winnerData) > 0 ? "Winners" : "No Winner", count($winnerData) > 0 ? $winnerData : null);
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }

    public function verify_user(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => "required|array",
                'circle_id' => "required"
            ]);

            // if (GroupMembers::where(['user_id' => $request->user_id, 'circle_id' => $request->circle_id])->exists()) {
            //     if (GroupMembers::where(['user_id' => $request->user_id, 'circle_id' => $request->circle_id, 'verified' => '1'])->exists()) {
            //         return $this->httpResponse(500, 500, "User Already Verified");
            // } else {
            GroupMembers::where('circle_id', $request->circle_id)->whereIn('user_id', $request->user_id)->update(['verified' => 1]);
            return $this->httpResponse(200, 200, "User Verified");
            // }
            // } else {
            //     return $this->httpResponse(500, 500, "User Not Found");
            // }
        } catch (Exception $e) {
            Log::error("" . $e->getMessage());
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function circles()
    {
        return $this->httpResponse(200, 200, "Circles With Draw Numbers", Circles::with(['draw_numbers'])->get());
    }

    public function user_circles(Request $request)
    {
        try {
            $user_id = Auth::id();
            $circle_lists = User::where('id', $user_id)->with(['group_members' => ['circle']])->first();
            // dd($circle_lists);
            $group_members = $circle_lists->group_members;
            foreach ($group_members as $key => $value) {
                // $circle = $value->circle;
                $circle = Circles::where('id', $value->circle_id)->withCount(['draw_numbers'])->first();
                $total_circle_amount = (int)$circle->circle_amount * (int)$circle->draw_numbers_count;
                $value->draw_numbers_count = (int)$circle->draw_numbers_count;
                $value->total_circle_amount = $total_circle_amount;
            }
            return $this->httpResponse(200, 200, "Circles Fetched", $circle_lists);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
            // return response()->json(['status' => 500, 'message' => "" . $e->getMessage()], 500);
        }
    }

    public function my_circles(Request $request)
    {
        try {
            MyCircleResource::withoutWrapping();
            $date = new DateTime(date('Y-m-d'));
            $date->modify("+7 day");
            $fridays = $this->getFridays('2023-11-01', $date->format('Y-m-d'));
            $circles = array();
            $j = 0;
            for ($i = 0; $i < count($fridays) - 1; $i++) {
                $myCircles = GroupMembers::where('user_id', Auth::id())->where('created_at', '>', $fridays[$i])->where('created_at', '<', $fridays[$i + 1])->with(['circle' => function (Builder $query) use ($request) {
                    if ($request->my_circles == true) {
                        $query->where('deleted_at', null);
                    }
                }])->get()->toArray();
                if (count($myCircles) > 0) {
                    $circles[$j]['date'] = $fridays[$i + 1];
                    $circles[$j]['circles'] = $myCircles;
                    $j++;
                }
            }
            // dd($circles);
            // $circleRes = $myCircles != null && count($myCircles) > 0 ? MyCircleResource::collection($myCircles)->response()->getData(true) : null;
            // return $this->httpResponse('200', '200', "My Circles Fetched", $circleRes);
            // $circles = Collection::make($circles);
            // dd($circles);
            $res = MyCircleResource::collection($circles)->response()->getData(true);
            $response = array();
            foreach ($res as $key => $value) {
                if (!empty($value) && count($value) != 0) {
                    // unset($res[$key]);
                    $response[] = $value;
                }
            }
            $circleRes = $circles != null && count($circles) > 0 ? $response : null;
            return $this->httpResponse('200', '200', "My Circles Fetched", $circleRes);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, '' . $e->getMessage());
        }
    }

    public function userCreatedCircle(Request $request)
    {
        try {
            $user_id = Auth::id();
            $circle = Circles::where('user_id', $user_id)->where('deleted_at', null)->withCount(['draw_numbers']);

            if ($circle->exists()) {

                $circle = $circle->first();
                $total_circle_amount = (int)$circle->draw_numbers_count * (int)$circle->circle_amount;
                $circle->total_circle_amount = $total_circle_amount;
                // unset($circle->draw_numbers_count);
                // $groupMembers = $circle->group_members;
                // foreach ($groupMembers as $key => $value) {
                //     // dd($value);
                //     $total_draw_numbers = DrawNumbers::where('user_id', $value->user_id)->where('circle_id', $value->circle_id)->count();
                //     $groupMembers[$key]['total_draw_numbers'] = $total_draw_numbers;
                // }
                $circleRes = new CircleResource($circle);
                return $this->httpResponse(200, 200, "Group Members Fetched", $circleRes);
            } else {
                return $this->httpResponse(200, 200, "No Circle Found");
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function remove_user(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'array|required',
            'circle_id' => 'required'
        ]);
        try {
            $deletedUsers = GroupMembers::where('circle_id', $validated['circle_id'])->whereIn('user_id', $validated['user_id'])->delete();
            return $this->httpResponse(200, 200, "Users Removed Successfully");
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function get_group_members(Request $request)
    {
        $validated = $request->validate([
            'circle_id' => "required",
        ]);
        try {
            GroupMemberResource::withoutWrapping();
            $groupMembers = GroupMembers::where('circle_id', $validated['circle_id'])->with(['user'])->get();
            $res = GroupMemberResource::collection($groupMembers)->response()->getData(true);
            return $this->httpResponse(200, 200, "Group Members Fetched", $res);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
            // return response()->json(['status' => 500, 'message' => "" . $e->getMessage()], 500);
        }
    }

    public function get_draw_numbers(Request $request)
    {
        $validated = $request->validate([
            'circle_id' => 'required'
        ]);
        try {
            MyNumbersResource::withoutWrapping();
            $user_id = Auth::id();

            $drawNumbers = DrawNumbers::where('circle_id', $validated['circle_id'])->where('user_id', $user_id)->get();
            $res = MyNumbersResource::collection($drawNumbers)->response()->getData(true);
            return $this->httpResponse(200, 200, "Draw Numbers Fetched", $res);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function getFriday()
    {
        try {
            $date = new DateTime(date('Y-m-d'));
            $date->modify("+7 day");

            return $this->getFridays('2023-11-01', $date->format("Y-m-d"));
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function get_winner_number()
    {
        try {
            $winningNumber = WinningNumber::where('deleted_at', null)->first();
            if ($winningNumber != null) {
                return $this->httpResponse(200, 200, "Details Fetched Successfully", ['number' => $winningNumber->winning_number, 'created_at' => $winningNumber->created_at]);
            } else {
                return $this->httpResponse(200, 200, "No Winning Number Found");
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(200, 200, "" . $e->getMessage());
        }
    }

    public function get_date_range_winner_number(Request $request)
    {
        try {
            // dd());
            $month = date("Y-m", strtotime($request->month));
            $winningNumbers = WinningNumber::where('created_at', 'LIKE', "%$request->month%")->select('id', 'winning_number', 'created_at')->get();
            // dd($winningNumbers);
            return $this->httpResponse(200, 200, $winningNumbers);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(200, 200, "" . $e->getMessage());
        }
    }

    public function notification_list(Request $request)
    {
        try {
            NotificationsResource::withoutWrapping();
            // $notificationsList = Notifications::where('to_user', Auth::id())->get();
            $resp = array();
            $todaysDate = Carbon::parse(date("Y-m-d"));
            $endDate = Carbon::parse(date('Y-m-d', strtotime('2023-11-01')));
            // dd($endDate);
            $j = 0;
            for ($i = $todaysDate; $todaysDate->gte($endDate); $i->subDay()) {
                // dd($i);
                // print_r($i->format("Y-m-d"));
                if (Notifications::where('to_user', Auth::id())->where('created_at', 'like', "%" . $i->format('Y-m-d') . "%")->exists()) {
                    // $resp[$j]['date'] = $i->equalTo(date('Y-m-d')) ? 'Today' : $i->format('Y-m-d');
                    $resp[$j]['date'] = $i->format('Y-m-d');
                    $resp[$j]['notifications'] = Notifications::where('to_user', Auth::id())->where('created_at', 'like', "%" . $i->format('Y-m-d') . "%")->get();
                    $j++;
                }
            }
            // foreach ($notificationsList as $value) {
            //     $notifications = Notifications::where('created_at', 'like', "%" . date('Y-m-d') . "%")->where('to_user', Auth::id())->get();
            // }
            // $res = NotificationsResource::collection($notificationsList)->response()->getData(true);
            return $this->httpResponse(200, 200, "Details Fetched", $resp);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(200, 200, "" . $e->getMessage());
        }
    }

    public function get_unread_count(Request $request)
    {
        try {
            $user_id = Auth::id();
            if ($request->mes_not == true) {
                $count = AdminMessages::where('to_user', $user_id)->where('read_at', null)->count();
            } else {
                $count = Notifications::where('to_user', $user_id)->where('read_at', null)->count();
            }
            return $this->httpResponse(200, 200, "Details Fetched", ['unreadMessageCount' => $count]);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, '' . $e->getMessage());
        }
    }

    public function read_all_texts(Request $request)
    {
        try {
            $user_id = Auth::id();
            if ($request->mes_not == true) {
                AdminMessages::where('to_user', $user_id)->where('read_at', null)->update(['read_at' => date('Y-m-d H:i:s')]);
            } else {
                Notifications::where('to_user', $user_id)->where('read_at', null)->update(['read_at' => date('Y-m-d H:i:s')]);
            }
            return $this->httpResponse(200, 200, "All Texts Rad Properly");
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, '' . $e->getMessage());
        }
    }

    public function message_list(Request $request)
    {
        try {
            AdminMessageResource::withoutWrapping();
            // $messageList = AdminMessages::where('to_user', Auth::id())->get();
            $resp = array();
            $todaysDate = Carbon::parse(date("Y-m-d"));
            $endDate = Carbon::parse(date('Y-m-d', strtotime('2023-11-01')));

            $j = 0;
            for ($i = $todaysDate; $todaysDate->gte($endDate); $i->subDay()) {
                // dd($i);
                // print_r($i->format("Y-m-d"));
                if (AdminMessages::where('to_user', Auth::id())->where('created_at', 'like', "%" . $i->format('Y-m-d') . "%")->exists()) {
                    // $resp[$j]['date'] = $i->equalTo(date('Y-m-d')) ? 'Today' : $i->format('Y-m-d');
                    $resp[$j]['date'] = $i->format('Y-m-d');
                    $resp[$j]['notifications'] = AdminMessages::where('to_user', Auth::id())->where('created_at', 'like', "%" . $i->format('Y-m-d') . "%")->get();
                    $j++;
                }
            }
            // $res = AdminMessageResource::collection($messageList)->response()->getData(true);
            // return $this->httpResponse(200, 200, "Data Fetched", $res);
            return $this->httpResponse(200, 200, "Details Fetched", $resp);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function read_message(Request $request)
    {
        try {
            $user_id = Auth::id();
            $message_id = $request->message_id;
            AdminMessages::where('to_user', $user_id)->where('read_at', null)->where('id', $message_id)->update(['read_at' => date('Y-m-d H:i:s')]);
            return $this->httpResponse(200, 200, "Message Rad");
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }

    public function getMonth()
    {
        try {
            $years = array();
            // dd(date('Y-m-d', strtotime('+2 day')));
            $dt = Carbon::now();
            $date = Carbon::createFromDate(date('Y', strtotime('2023-10-01')), date('m', strtotime('2023-10-01')), date('d', strtotime('2023-10-01')));
            // dd($dt->diffInMonths($date));
            $diff = $dt->diffInMonths($date);

            for ($i = 0; $i <= $diff; $i++) {
                $years[] = date('F Y', strtotime('-' . $i . ' month'));
            }

            // for ($year = date("Y-m", strtotime(date('2023-11-01', strtotime('+1 month')))); $year <= date("Y-m"); $year++) {
            //     $years[] = $year;
            //     // for ($month = date('m'); $month >= date('m'); $month--) {
            //     //     $years[] = "$year-$month";
            //     // }
            // }
            return $this->httpResponse(200, 200, "Details Fetched", $years);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }
}
