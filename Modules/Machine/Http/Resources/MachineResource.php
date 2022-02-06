<?php

namespace Modules\Machine\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Category\Entities\Category;
use Modules\City\Entities\City;
use Modules\MachineModel\Entities\MachineModel;
use Modules\Manufacture\Entities\Manufacture;
use Modules\SubCategory\Entities\SubCategory;
use Modules\Upload\Entities\Upload;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Support\Facades\Config;
use Modules\Machine\Entities\Machine;

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
            'price' =>  $this->show_price == 1 ? currency_converter('USD',$this->price) : 'Price Hidden',
            'approved' => $this->approved,
            'seller_id' => User::find($this->seller_id,['id','first_name', 'last_name', 'company_name', 'country', 'email']),
            'city_id' => City::find($this->city_id,$selected_columns),
            'category_id' => Category::find($this->category_id,$selected_columns),
            'sub_category_id' => SubCategory::find($this->sub_category_id,$selected_columns),
            'manufacture_id' => Manufacture::find($this->manufacture_id,$selected_columns),
            'model_id' => MachineModel::find($this->model_id,$selected_columns),
            'views' => views(Machine::find($this->id))->count(),
        ];
        return $data;
    }
}