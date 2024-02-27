<?php

namespace App\Http\Resources;

use App\Models\DrawNumbers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $resource = array();
        $resource = parent::toArray($request);

        // // d
        // dd($resource);
        $resource['verified'] = $this->verified == '1' ? true : false;
        $resource['user_name'] = $this->user->first_name . " " . $this->user->last_name;
        $resource['draw_numbers_count'] = DrawNumbers::where('circle_id', $this->circle_id)->where('user_id', $this->user_id)->count();
        unset($resource['user']);
        unset($resource['user_id'], $resource['deleted_at'], $resource['circle_id'], $resource['created_at'], $resource['updated_at']);
        // dd($resource['verified']);
        return $resource;
    }
}
