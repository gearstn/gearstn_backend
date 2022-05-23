<?php

namespace Modules\SparePart\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSparePartRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year' => 'required',
            'sn' => 'sometimes',
            'description' => 'required',
            // 'country' => 'required',
            'slug' => 'sometimes',
            'seller_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'manufacture_id' => 'required',
            'model_id' => 'required_without:new_spare_part_model',
            'city_id' => 'sometimes',
            'new_spare_part_model' => 'required_without:model_id',
            'sku' => 'sometimes',
            'price' => 'sometimes',
            "photos" => ["required","array","min:1","max:5"],
            "photos.*" => ["required","mimes:jpeg,jpg,png,gif,webp","max:1000"],
            'country_id' => 'required'
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
