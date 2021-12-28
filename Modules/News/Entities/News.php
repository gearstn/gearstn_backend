<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'title_en',
        'title_ar',
        'post_date',
        'image_url',
        'bodytext',
        'slug',
    ];
    public static $cast = [
        'title_en' => 'required',
        'title_ar' => 'required',
        'post_date' => 'required',
        'image_url' => 'required',
        'bodytext' => 'required',
    ];
        
    protected static function newFactory()
    {
        //return \Modules\News\Database\factories\NewsFactory::new();
    }
}