<?php

namespace Modules\BrandedPage\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandedPagePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required',
            'branded_page_id' => 'required',
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