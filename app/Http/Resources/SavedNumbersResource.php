<?php

namespace App\Http\Resources;

use App\Models\WinningNumber;
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

        if (isset($this->winner)) {
            $resource['winner'] = $this->winner;
        }

        if (isset($this->winning_number_id)) {
            $resource['winning_number'] = WinningNumber::where('id', $this->winning_number_id)->first()->winning_number;
            $resource['time'] = WinningNumber::where('id', $this->winning_number_id)->first()->created_at;
        }

        return $resource;
    }
}
