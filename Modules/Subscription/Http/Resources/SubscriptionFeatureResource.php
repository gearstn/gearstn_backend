<?php

namespace Modules\Subscription\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'value' => str_contains($this->slug, 'cost') ? currency_converter('USD',(float)$this->value) : $this->value,
        ];
        return $data;     
    }
}
