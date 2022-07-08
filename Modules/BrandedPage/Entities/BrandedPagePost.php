<?php

namespace Modules\BrandedPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandedPagePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'image_id',
        'branded_page_id',
    ];

    // protected static function newFactory()
    // {
    // }
}
