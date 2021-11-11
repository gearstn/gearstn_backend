<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */







    public function run()
    {
        $sub_categories = [
            [
                'title_en' => 'wheel loaders',
                'title_ar' => 'wheel loaders',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'excavators',
                'title_ar' => 'excavators',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'backhoe loader',
                'title_ar' => 'backhoe loader',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'backhoe loader',
                'title_ar' => 'backhoe loader',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'roller',
                'title_ar' => 'roller',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'wheel excavators',
                'title_ar' => 'wheel excavators',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'crawlaer loaders',
                'title_ar' => 'crawlaer loaders',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'skid steere',
                'title_ar' => 'skid steere',
                'category_id' => Category::all()->random()->id,
            ],
            [
                'title_en' => 'dozer',
                'title_ar' => 'dozer',
                'category_id' => Category::all()->random()->id,
            ],
       ];

       foreach ($sub_categories as $sub_category) {
           SubCategory::create($sub_category);
       }
    }
}
