<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchCircleResource extends JsonResource
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
        // $resource[''] = "";
        $resource = parent::toArray($request);
        $resource['circle_type'] = $resource['circle_type'] == '1' ? 'Private' : 'Public';
        unset($resource['deleted_at'], $resource['created_at'], $resource['updated_at']);
        $resource['group_members'] =  isset($resource['group_members']) && $resource['group_members'] != null ? GroupMemberResource::collection($resource['group_members']) : null;
        return $resource;
    }
}
