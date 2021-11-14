<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{

    use HasFactory;
    protected $table = 'machines';
    protected $fillable = [
        'year',
        'sn',
        'condition',
        'hours',
        'description',
        'sell_type',
        'rent_hours',
        'country',
        'slug',
        'images',
        'approved',
        'sku',
        'price',
        'seller_id',
        'category_id',
        'sub_category_id',
        'manufacture_id',
        'model_id',
    ];
    public static $cast = [
        'description' => 'required',
        'condition' => 'required',
        'sell_type' => 'required',
        'seller_id' => 'required',
        'sub_category_id' => 'required',
        'manufacture_id' => 'required',
        'model_id' => 'required',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function machine_model()
    {
        return $this->belongsTo(MachineModel::class);
    }

    //User how want to sell a machine
    public function seller()
    {
        return $this->belongsTo(MachineModel::class);
    }

}
