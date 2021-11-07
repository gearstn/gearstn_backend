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
        'seller_id',
        'category_id',
        'subcategory_id',
        'manufacture_id',
        'model_id',
    ];
    public static $cast = [
        'description' => 'required',
        'condition' => 'required',
        'sell_type' => 'required',
        'seller_id' => 'required',
        'subcategory_id' => 'required',
        'manufacture_id' => 'required',
        'model_id' => 'required',
    ];
}
