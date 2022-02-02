<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\City;
use App\Models\MachineModel;
use App\Models\Manufacture;
use App\Models\SubCategory;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MachineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $selected_columns = ['id','title_en','title_ar'];
        $data = [
            "id" => $this->id,
            'year' => $this->year,
            'sn' => $this->sn,
            'condition' => $this->condition,
            'hours' => $this->hours,
            'description' => $this->description,
            'sell_type' => $this->sell_type,
            'rent_hours' => $this->rent_hours,
            'country' => $this->country,
            'slug' => $this->slug,
            'images' => Upload::findMany(json_decode($this->images),['id', 'url']),
            'skq' => $this->skq,
            'price' => $this->price,
            'approved' => $this->approved,
            'seller_id' => User::find($this->seller_id,['first_name', 'last_name', 'company_name', 'country', 'email', 'phone']),
            'city_id' => City::find($this->city_id,$selected_columns),
            'category_id' => Category::find($this->category_id,$selected_columns),
            'sub_category_id' => SubCategory::find($this->sub_category_id,$selected_columns),
            'manufacture_id' => Manufacture::find($this->manufacture_id,$selected_columns),
            'model_id' => MachineModel::find($this->model_id,$selected_columns),
        ];
        return $data;
    }
}