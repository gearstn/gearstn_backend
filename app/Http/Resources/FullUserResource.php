<?php

namespace App\Http\Resources;

use App\Models\Upload;
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
            "tax_license_image" => Upload::find($this->tax_license_image,['id', 'url']),
            "commercial_license" => $this->commercial_license,
            "commercial_license_image" => Upload::find($this->commercial_license_image,['id', 'url']),
            "country" => $this->country,
            "role" => $this->getRoleNames(),
        ];
        return $data;
    }
}
