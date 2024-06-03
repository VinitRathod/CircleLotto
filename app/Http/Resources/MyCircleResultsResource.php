<?php

namespace App\Http\Resources;

use App\Models\DrawNumbers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyCircleResultsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $resource = array();

        $resource['owner'] = $this->user->id == $this->circle->user_id ? true : false;
        $resource['player_name'] = $this->user->first_name . "" . $this->user->last_name;
        foreach ($this->user->draw_numbers as $value) {
            if ($value->winner == '1') {
                $payout = "£" . ((DrawNumbers::where('circle_id', $this->circle->id)->count() * (int)$this->circle->circle_amount) - 1);
            } else {
                $payout = '£0';
            }
            $resource['numbers'][] = ['number' => $value->numbers, 'winner' => $value->winner == '1' ? true : false, 'payout' => $payout];

            // dd($value);
        }
        $resource['rewards'] = $resource['owner'] == true ? '£1' : '£0';
        // dd($resource);
        return $resource;

        // return parent::toArray($request);
    }
}
