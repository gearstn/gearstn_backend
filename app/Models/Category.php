<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['title_en','title_ar'];

    public static $cast = [
        'title_en' => 'required|unique:categories',
        'title_ar' => 'required',
    ];

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->title_en,
        );
    }

}
