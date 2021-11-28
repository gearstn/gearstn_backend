<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'title',
        'post_date',
        'image_url',
        'bodytext',
        'slug',
    ];
    public static $cast = [
        'title' => 'required',
        'post_date' => 'required',
        'image_url' => 'required',
        'bodytext' => 'required',
    ];
}
