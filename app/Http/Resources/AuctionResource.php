<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuctionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "title" => $this->title,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "country" => $this->country,
        ];
        return $data;
    }
}
