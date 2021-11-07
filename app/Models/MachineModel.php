<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineModel extends Model
{

    use HasFactory;
    protected $table = 'models';
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
}
