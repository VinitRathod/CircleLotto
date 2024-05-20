<?php

namespace App\Http\Resources\Admin;

use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCircles extends JsonResource
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
        $resource['circle_type'] = $this->circle->circle_type == '1' ? 'Private' : 'Public';
        $resource['circle_amount'] = $this->circle->circle_amount;
        $resource['created_by'] = $this->circle->user->first_name . " " . $this->circle->user->last_name;
        $resource['total_number_of_users'] = GroupMembers::where('circle_id', $this->circle->id)->count();
        $resource['created_at'] = date('d/m/Y H:i:s', strtotime($this->circle->created_at));
        $resource['owner'] = $this->user_id == $this->circle->user->id;
        return $resource;
        // return parent::toArray($request);
    }
}
