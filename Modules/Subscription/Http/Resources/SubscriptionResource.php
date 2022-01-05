<?php

namespace Modules\Subscription\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'description' => $this->description,
            'is_active' => $this->is_active,
            'price' => currency_converter('USD',$this->price),
            'currency' => $this->currency,
            'invoice_period' => $this->invoice_period,
            'invoice_interval' => $this->invoice_interval,
            'features' => $this->features->sortBy('sort_order'),
        ];
        return $data;    }
}
