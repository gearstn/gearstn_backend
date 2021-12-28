<?php

namespace Modules\Manufacture\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManufactureResource extends JsonResource
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
            "title_en" => $this->title_en,
            "title_ar" => $this->title_ar,
            "sub_category_id" => $this->sub_category_id,
        ];
        return $data;
    }
}