<?php

namespace App\Http\Resources;

use App\Models\DrawNumbers;
use App\Models\User;
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
        GroupMemberResource::withoutWrapping();
        $resource = array();
        $resource = parent::toArray($request);

        // dd($resource);
        $resource['verified'] = $resource['verified'] == '1' ? true : false;
        $resource['draw_numbers_count'] = DrawNumbers::where('circle_id', $resource['circle_id'])->where('user_id', $resource['user_id'])->count();
        if (isset($this->user)) {
            $resource['user_name'] = $this->user->first_name . " " . $this->user->last_name;
            unset($resource['user']);
        } else {
            $user = User::where('id', $resource['user_id'])->first();
            $resource['user_name'] = $user->first_name . " " . $user->last_name;
        }
        unset($resource['user_id'], $resource['deleted_at'], $resource['circle_id'], $resource['created_at'], $resource['updated_at']);
        // dd($resource['verified']);
        return $resource;
    }
}
