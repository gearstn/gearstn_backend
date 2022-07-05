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
            'name_en' => 'required',
            'name_ar' => 'required',
            'slug' => 'sometimes',
            'about_en' => 'required',
            'about_ar' => 'required',
            'address' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'website_link' => 'required',
            'user_id' => 'required',
            "photos" => ["required", "array", "min:1", "max:5"],
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
