<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\MachineModel;
use App\Models\Manufacture;
use App\Models\SubCategory;
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
            'images' => $this->images,
            'approved' => $this->approved,
            'price' => $this->price,
            'seller_id' => $this->seller_id,
            'category_id' => Category::find($this->category_id,$selected_columns),
            'sub_category_id' => SubCategory::find($this->sub_category_id,$selected_columns),
            'manufacture_id' => Manufacture::find($this->manufacture_id,$selected_columns),
            'model_id' => MachineModel::find($this->model_id,$selected_columns),
        ];
        return $data;
    }
}
