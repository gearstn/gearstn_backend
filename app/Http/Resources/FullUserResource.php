<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FullUserResource extends JsonResource
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
            "last_name" => $this->last_name,
            "company_name" => $this->company_name,
            "email" => $this->email,
            "tax_license" => $this->tax_license,
            "tax_license_image" => $this->tax_license_image,
            "commercial_license" => $this->commercial_license,
            "commercial_license_image" => $this->commercial_license_image,
            "country" => $this->country,
        ];
        return $data;
    }
}
