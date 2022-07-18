<?php

namespace Modules\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\BrandedPage\Entities\BrandedPage;

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
            "last_name" => $this->last_name,
            "company_name" => $this->company_name,
            "phone" => $this->phone,
            "email" => $this->email,
            "country" => $this->country,
            "role" => $this->getRoleNames(),
            "phone" => $this->phone,
            'has_branded_page' => BrandedPage::where('user_id', $this->id)->exists(),
            'can_own_branded_page' => $this->can_own_branded_page,
        ];
        return $data;
    }
}
