<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ManufactureCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ManufactureResource::collection($this->collection),
            'total' => $this->collection->count(),
            // 'per_page' => $this->collection->perPage(),
            // 'current_page' => $this->collection->currentPage(),
            // 'last_page' => $this->collection->lastPage(),
            // 'base_page_url' => $this->collection->url(1),
            // 'next_page_url' => $this->collection->nextPageUrl(),
            // 'prev_page_url' => $this->collection->previousPageUrl(),
        ];
    }
}
