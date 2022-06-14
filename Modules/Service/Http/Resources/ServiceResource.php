<?php

namespace Modules\Service\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Modules\Country\Entities\Country;
use Modules\ServiceType\Entities\ServiceType;
use Modules\City\Entities\City;
class ServiceResource extends JsonResource
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
            "company_name" => $this->company_name,
            "address" => $this->address,
            "description" => $this->description,
            'approved' => $this->approved,
            'user' => User::find($this->user_id,['id','first_name', 'last_name', 'company_name', 'country', 'email' , 'phone']),
            'service_type_id' => ServiceType::find($this->service_type_id,['id','title_en', 'title_ar']),
            'city_id' => City::find($this->city_id,$selected_columns),
            'country_id' => Country::find($this->country_id,$selected_columns),
            'images' => Upload::findMany(json_decode($this->images),['id', 'url']),
        ];
        return $data;
    }
}
