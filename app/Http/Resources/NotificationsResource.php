<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        // return parent::toArray($request);
        $resource = array();
        $resource['id'] = $this->id;
        $resource['user_id'] = $this->to_user;
        $resource['title'] = $this->title;
        $resource['body'] = $this->body;
        $resource['created_at'] = $this->created_at;
        return $resource;
    }
}
