<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class SubCategory extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->title_en,
        );
    }
}
