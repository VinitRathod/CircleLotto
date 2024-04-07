<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use App\Models\DrawNumbers;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class MyCircleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $resource = array();
        $resource['circle_id'] = $this->circle->id;
        $resource['circle_name'] = $this->circle->circle_name;
        $resource['circle_amount'] = $this->circle->circle_amount;
        $resource['circle_type'] = $this->circle->circle_type == '1' ? 'Private' : 'Public';
        $resource['draw_numbers_count'] = DrawNumbers::where('circle_id', $this->circle->id)->where('user_id', Auth::id())->count();
        $resource['total_circle_amount'] = (int)$resource['circle_amount'] * (int)$resource['draw_numbers_count'];
        $resource['group_member_count'] = GroupMembers::where('circle_id', $this->circle->id)->count();
        $resource['time'] = $this->circle->created_at;
        return $resource;
    }
}
