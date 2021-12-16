<?php

namespace Modules\Manufacture\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Machine\Entities\Machine;
use Modules\MachineModel\Entities\MachineModel;
use Modules\SubCategory\Entities\SubCategory;

class Manufacture extends Model
{
    use HasFactory;

    protected $table = 'manufactures';
    protected $fillable = [
        'title_en',
        'title_ar',
        'sub_category_id',
    ];

    public static $cast = [
        'title_en' => 'required|unique:manufactures',
        'title_ar' => 'required',
        'sub_category_id' => 'required',
    ];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function machine_models()
    {
        return $this->hasMany(MachineModel::class);
    }
    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
        
    protected static function newFactory()
    {
        //return \Modules\Manufacture\Database\factories\ManufactureFactory::new();
    }
}
