<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{

    use HasFactory;
    protected $table = 'machines';
    protected $fillable = [
        'seller_id',
        'category',
        'sub_category',
        'manufacture',
        'model',
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
    ];
}