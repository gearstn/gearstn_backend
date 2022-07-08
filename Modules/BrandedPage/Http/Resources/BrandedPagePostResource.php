<?php

namespace Modules\BrandedPage\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\BrandedPage\Entities\BrandedPage;
use Modules\Upload\Entities\Upload;

class BrandedPagePostResource extends JsonResource
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
            'content' => $this->content,
            'image_id' => Upload::find($this->image_id, ['id', 'url']),
            'branded_page_id' => BrandedPage::find($this->branded_page_id, ['id', 'slug']),
        ];
        return $data;    }
}
