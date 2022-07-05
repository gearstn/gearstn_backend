<?php

namespace Modules\BrandedPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandedPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'slug',
        'about_en',
        'about_ar',
        'address',
        'facebook_link',
        'twitter_link',
        'website_link',
        'user_id',
        'image_id',
    ];

    protected static function newFactory()
    {
        // return \Modules\BrandedPage\Database\factories\BrandedPageFactory::new();
    }
}
