<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'title_en',
        'title_ar',
        'name_en',
        'name_ar',
        'image_url',
    ];
    public static $cast = [
        'title_en' => 'required',
        'title_ar' => 'required',
        'name_en' => 'required',
        'name_ar' => 'required',
    ];
}
