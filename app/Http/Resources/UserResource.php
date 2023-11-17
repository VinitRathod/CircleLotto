<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $resource = [
            'id' => $this->id,
            'title' => $this->title,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ];

        if ($this->saved_numbers != null) {
            $resource = array_merge($resource, ['saved_numbers' => SavedNumbersResource::collection($this->saved_numbers)]);
        }

        return $resource;
        // return parent::toArray($request);
    }
}
