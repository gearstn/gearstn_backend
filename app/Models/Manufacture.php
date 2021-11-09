<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
