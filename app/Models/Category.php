<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['title_en','title_ar'];

    public static $cast = [
        'title_en' => 'required|unique:categories',
        'title_ar' => 'required',
    ];
}
