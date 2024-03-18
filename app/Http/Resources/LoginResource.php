<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
        $resource = parent::toArray($request);
        unset($resource['created_at'], $resource['updated_at'], $resource['deleted_at'], $resource['email_verified_at']);
        return $resource;
    }
}
