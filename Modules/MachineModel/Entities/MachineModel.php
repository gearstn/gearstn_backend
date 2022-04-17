<?php

namespace Modules\MachineModel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Modules\Machine\Entities\Machine;
use Modules\Manufacture\Entities\Manufacture;
use Modules\SubCategory\Entities\SubCategory;

class MachineModel extends Model
{
    use HasFactory;
    protected $table = 'machine_models';

    protected $fillable = [
        'title_en',
        'title_ar',
        'category_id',
        'sub_category_id',
        'manufacture_id',
    ];

    public static $cast = [
        'title_en' => 'required|unique:models',
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
    public function machines()
    {
        return $this->hasMany(Machine::class);
    }

    protected static function newFactory()
    {
        //return \Modules\MachineModel\Database\factories\MachineModelFactory::new();
    }
}
