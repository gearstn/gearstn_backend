<?php

namespace Modules\BrandedPage\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandedPageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'sometimes',
            'about_en' => 'required',
            'about_ar' => 'required',
            'address' => 'required',
            'facebook_link' => 'sometimes',
            'twitter_link' => 'sometimes',
            'linkedin_link' => 'sometimes',
            'instagram_link' => 'sometimes',
            'youtube_channel_link' => 'sometimes',
            'website_link' => 'sometimes',
            'user_id' => 'sometimes',
            "photos" => ["required", "array", "min:1", "max:1"],
            "photos.*" => ["required", "mimes:jpeg,jpg,png,gif,webp", "max:1000"],
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
