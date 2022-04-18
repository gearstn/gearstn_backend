<?php

namespace Modules\SparePartModel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

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

        $categories = [
            [
                'title_en' => 'spare parts',
                'title_ar' => 'فطع غيار',
                'image_url' => 'spare-parts.png',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
