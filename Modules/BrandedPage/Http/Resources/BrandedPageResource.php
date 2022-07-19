<?php

namespace Modules\BrandedPage\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Upload\Entities\Upload;

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
        $data = [
            "id" => $this->id,
            'about_en' => $this->about_en,
            'about_ar' => $this->about_ar,
            'slug' => $this->slug,
            'facebook_link' => $this->facebook_link,
            'twitter_link' => $this->twitter_link,
            'instagram_link' => $this->instagram_link,
            'youtube_link' => $this->youtube_link,
            'address' => $this->address,
            'website_link' => $this->website_link,
            'image_id' => Upload::find($this->image_id, ['id', 'url']),
            'user_id' => User::find($this->user_id, ['id', 'first_name', 'last_name', 'company_name', 'country', 'email', 'phone']),
        ];
        return $data;
    }
}
