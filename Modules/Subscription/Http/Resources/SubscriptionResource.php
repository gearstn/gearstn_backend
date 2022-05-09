<?php

namespace Modules\Subscription\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

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
            'price' => currency_converter('EGP', $this->price == null ? 0 : $this->price),
            'currency' => $this->currency,
            'invoice_period' => $this->invoice_period,
            'invoice_interval' => $this->invoice_interval,
            'features' => SubscriptionFeatureResource::collection($this->features->sortBy('sort_order')),
        ];
        if ( (Route::current()->uri == 'api/user-subscriptions-by-type' || Route::current()->uri == 'api/user-all-subscriptions') && str_contains($this->slug,'machine') ) {
            $data['features_usages'] = new SubscriptionFeatureRemanings($this);
        }
        return $data;
    }
}
