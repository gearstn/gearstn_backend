<?php

namespace Modules\SparePart\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Category\Entities\Category;
use Modules\City\Entities\City;
use Modules\Manufacture\Entities\Manufacture;
use Modules\SparePart\Entities\SparePart;
use Modules\SparePartModel\Entities\SparePartModel;
use Modules\SubCategory\Entities\SubCategory;
use Modules\Upload\Entities\Upload;

class SparePartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $selected_columns = ['id','title_en','title_ar'];
        $data = [
            "id" => $this->id,
            'year' => $this->year,
            'sn' => $this->sn,
            'description' => $this->description,
            'country' => $this->country,
            'slug' => $this->slug,
            'images' => Upload::findMany(json_decode($this->images),['id', 'url']),
            'skq' => $this->skq,
            'price' =>  $this->price == null ? null :currency_converter('USD',$this->price),
            'approved' => $this->approved,
            'seller_id' => User::find($this->seller_id,['id','first_name', 'last_name', 'company_name', 'country', 'email' , 'phone']),
            'city_id' => City::find($this->city_id,$selected_columns),
            'category_id' => Category::find($this->category_id,$selected_columns),
            'sub_category_id' => SubCategory::find($this->sub_category_id,$selected_columns),
            'manufacture_id' => Manufacture::find($this->manufacture_id,$selected_columns),
            'model_id' => SparePartModel::find($this->spare_part_model,$selected_columns)->first(),
            'views' => views(SparePart::find($this->id))->count()
        ];
        return $data;    
    }
}