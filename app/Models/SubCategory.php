<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = [
        'title_en',
        'title_ar',
        'category_id',
    ];

    public static $cast = [
        'title_en' => 'required|unique:subcategories',
        'title_ar' => 'required',
        'category_id' => 'required',
    ];
}
