<?php

namespace Modules\BrandedPage\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandedPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
