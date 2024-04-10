<?php

namespace App\Http\Resources;

use App\Models\WinningNumber;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyNumbersResource extends JsonResource
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

        // if (isset($this->winner)) {
        $resource['winner'] = $this->winner;
        // }

        // if (isset($this->winning_number_id)) {
        $winNumber = WinningNumber::where('id', $this->winning_number_id)->first();
        $resource['winning_number'] = $winNumber != null ? $winNumber->winning_number : [];
        $resource['time'] = $winNumber != null ? $winNumber->created_at : null;
        // }

        return $resource;
    }
}
