<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminMessageResource extends JsonResource
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
        $resource['text'] = $this->text;
        $resource['created_at'] = $this->created_at;
        return $resource;
        // return parent::toArray($request);
    }
}
