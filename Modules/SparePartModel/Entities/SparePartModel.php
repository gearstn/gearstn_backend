<?php

namespace Modules\SparePartModel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SparePartModel extends Model
{
    use HasFactory;
    protected $table = 'spare_part_models';

    protected $fillable = [
        'title_en',
        'title_ar',
        'category_id',
        'sub_category_id',
        'manufacture_id',
    ];

    public static $cast = [
        'title_en' => 'required|unique:spare_part_models',
        'title_ar' => 'required',
        'category_id' => 'required',
        'sub_category_id' => 'required',
        'manufacture_id' => 'required',
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
    public function spare_parts()
    {
        return $this->hasMany(SparePart::class);
    }

    protected static function newFactory()
    {
        //return \Modules\MachineModel\Database\factories\MachineModelFactory::new();
    }
}
