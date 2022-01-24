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
        'image_id',
        'bodytext_en',
        'bodytext_ar',
        'slug',
        'mins_read',
        'author',
        'seo_title',
        'seo_description',
    ];
    public static $cast = [
        'title_en' => 'required',
        'title_ar' => 'required',
        'post_date' => 'required',
        'image_id' => 'required',
        'bodytext_en' => 'required',
        'bodytext_ar' => 'required',
        'author' => 'string',
        'mins_read' => 'integer',
        'seo_title' => 'string',
        'seo_description' => 'string',
    ];
        
    protected static function newFactory()
    {
        //return \Modules\News\Database\factories\NewsFactory::new();
    }
}
