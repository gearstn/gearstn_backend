<?php

namespace Database\Seeders;

use App\Models\Manufacture;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufactures = [
            [
                'title_en' => 'cat',
                'title_ar' => 'cat',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => ' john deere',
                'title_ar' => ' john deere',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'volvo',
                'title_ar' => 'volvo',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'kawasaki',
                'title_ar' => 'kawasaki',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'hitachi',
                'title_ar' => 'hitachi',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'komaysu',
                'title_ar' => 'komaysu',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'case',
                'title_ar' => 'case',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'dosan',
                'title_ar' => 'dosan',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'jcb',
                'title_ar' => 'jcb',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
            [
                'title_en' => 'newholland',
                'title_ar' => 'newholland',
                'sub_category_id' => SubCategory::all()->random()->id,
            ],
       ];

       foreach ($manufactures as $manufacture) {
           Manufacture::create($manufacture);
       }
    }
}
