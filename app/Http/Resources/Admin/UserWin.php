<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserWin extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $resource = array();
        $resource['id'] = $this->id;
        $resource['circle_id'] = $this->circle->id;
        $resource['numbers'] = $this->user_number;
        $resource['circle_name'] = $this->circle->circle_name;
        $resource['win_type'] = $this->status;

        $resource['created_at'] = $this->created_at;

        return $resource;
        // return parent::toArray($request);
    }
}
