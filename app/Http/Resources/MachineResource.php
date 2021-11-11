<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MachineResource extends JsonResource
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
            'year' => $this->year,
            'sn' => $this->sn,
            'condition' => $this->condition,
            'hours' => $this->hours,
            'description' => $this->description,
            'sell_type' => $this->sell_type,
            'rent_hours' => $this->rent_hours,
            'country' => $this->country,
            'slug' => $this->slug,
            'images' => $this->images,
            'approved' => $this->approved,
            'seller_id' => $this->seller_id,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
            'manufacture_id' => $this->manufacture_id,
            'model_id' => $this->model_id,
        ];
        return $data;
    }
}
