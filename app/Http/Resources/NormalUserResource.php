<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NormalUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "company_name" => $this->company_name,
            "email" => $this->email,
            "country" => $this->country,
        ];
        return $data;
    }
}