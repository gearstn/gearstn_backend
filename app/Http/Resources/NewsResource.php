<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            "title_en" => $this->title_en,
            "title_ar" => $this->title_ar,
            "image_id" => $this->image_id,
            "bodytext_en" => $this->bodytext_en,
            "bodytext_ar" => $this->bodytext_ar,
            "slug" => $this->slug,
        ];
        return $data;
    }
}
