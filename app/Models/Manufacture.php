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
        'subcategory_id',
    ];

    public static $cast = [
        'title_en' => 'required|unique:manufactures',
        'title_ar' => 'required',
        'subcategory_id' => 'required',
    ];
}
