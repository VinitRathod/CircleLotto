<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CircleResource extends JsonResource
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
        $resource['circle_type'] = $resource['circle_type'] == '1' ? 'Private' : 'Public';
        unset($resource['created_at'], $resource['updated_at'], $resource['deleted_at']);
        return $resource;
    }
}
