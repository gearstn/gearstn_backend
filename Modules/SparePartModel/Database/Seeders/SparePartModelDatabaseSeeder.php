<?php

namespace Modules\SparePartModel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\SparePartModel\Entities\SparePartModel;
use Modules\SubCategory\Entities\SubCategory;

class SparePartModelDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $category =
            [
                'title_en' => 'spare parts',
                'title_ar' => 'فطع غيار',
                'image_url' => 'spare-parts.png',
            ];

           $cat_result = Category::create($category);


        $subcategory = [
            'title_en' => 'Engine',
            'title_ar' => 'محرك',
            'category_id' => 2,
        ];
        $sub_result = SubCategory::create($subcategory);

        $spare_part_model = [
            'title_en' => 'dx-engine',
            'title_ar' => 'dx-engine',
            'category_id' => $cat_result->id,
            'sub_category_id' =>$sub_result->id ,
            'manufacture_id' => 1,
        ];
        SparePartModel::create($spare_part_model);
    }
}
