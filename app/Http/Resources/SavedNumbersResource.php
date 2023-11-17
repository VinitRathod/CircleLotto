<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SavedNumbersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        // return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     ''
        // ];

        // $resource = [
        //     'id'=>$this->id,

        // ];
        $resource = [
            'id' => $this->id,
            'numbers' => $this->numbers
        ];

        return $resource;
    }
}
